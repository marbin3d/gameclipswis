#COLABORATIVE FILTERING BASED ON RATING
#implemented in LINK SERVICES ONLINE for GameClips UQ project 2018 purpose

# RESTful application for recommender

""" the environment has been set up inside main.cgi which resides in this folder of the project, hence, myapp and main.cgi work together setting the environment and the applicaiton for the environment to work on."""
  
#ACTIVATE ENVIRONMENT in python 3.6.3

#import sys
from flask import Flask, render_template, jsonify
#from flask import *


import cv2
import numpy as np
import pandas as pd

from flask import Response
import jsonpickle
import os


#to anable RESTful JSON requests to this site via AJAX
from flask_cors import CORS


#lib to get arguments from the req
# req sample: login?page=10&filter=test
from flask import request


app = Flask(__name__)
#access all domains on all routes. It is possible specific to a route as well.
CORS(app)



from flask import Response
# exampleTest Recommendation System request: /suma?a=10&b=20 movie recommend
@app.route('/recommend', methods=['POST'])
def recommenderGameClips():
#a b : variables in the req

    try:    
    
        ###########################################################################
        #works!
        ##return jsonify({'name' : 'Marbin Sarria'})           
        #json_data = request.get_json()
        #name = json_data[0]['name']
                            
            
        #Get json object as input
        json_data = request.get_json()
        #name = json_data[0]['users'][0]['name'] #test first record
        #name = json_data[0]['users'][1]['name']  #test 2nd record 
        
        #Extraxt all users in an array
        numberOfUsers=len(json_data[0]['users'])        
        allUsersIds=[]
        #iterate over data to extract or by pandas df=pd.read_json(json_data[0])
        for i in range(0,numberOfUsers):
            allUsersIds.append(json_data[0]['users'][i]['userId'])
            
                       
                
        # Extract all videos in a n array 
        numberOfVideos=len(json_data[0]['videos'])
        allVideosIds=[]        
        #iterate over data to extract or by pandas df=pd.read_json(json_data[0])
        for k in range(0,numberOfVideos):
            allVideosIds.append(json_data[0]['videos'][k]['videoId'])
            
        
        # Extract all videos in a n array 
        numberOfVideosUsersRated=len(json_data[0]['userVideosRated'])
        
        #would be a dictionary
        allUsersVideosIdsRatedDict={}  #user1:{"video1":"rating value"}  #data structure 3D as json
        allUsersVideosIdsRated=[]        
        #iterate over data to extract or by pandas df=pd.read_json(json_data[0])
        for s in range(0,numberOfVideosUsersRated):
            #allUsersVideosIdsRated.append(json_data[0]['userVideosRated'][s]['userId']) #out
            #allUsersVideosIdsRated.append(json_data[0]['userVideosRated'][s]['videoId'])  #in  val         
              # in key of val
            
            ks1=json_data[0]['userVideosRated'][s]['userId']
            
            ks2=json_data[0]['userVideosRated'][s]['videoId']
            
            rt=json_data[0]['userVideosRated'][s]['rating']
            
            allUsersVideosIdsRated.append(rt)
            
            #filling up dictionary #{'userId':{"videoId":"rating value"}}  #data structure 3D as json           
            allUsersVideosIdsRatedDict[ks1]={ks2:rt}           
            
            
        #Retrieve the rating given by a user to a video                
        #args:dataDictIn,userId,videoId
        #return rating
        def getRating(dataDictionaryIn,userIdIn,videoIdIn):
            return dataDictionaryIn[userIdIn][videoIdIn]        
        
        ######################## 
        ##### Start <Recommender Computation> ###########################################
        """@require: 
           all usersIds,
           all videoIds,
           ratings associated to those.
           
           using pandas to create a pivot table and performing join operation
        """
        
        #arrays samples test with unique elements
        allusersXXX=["userId1","userId2","userId3","userId4","userId5","userId6"]
        allvideosXXX=["video1","video2","video3","video4"]
        
        #JSON sample test object ratings
        ratingsDictXXX={
            "userId1": 
                {
                    "video1": 4,

                },

            "userId2": 
                {
                    "video1": 2,

                },

            "userId3": 
                {
                    "video2": 2,

                },

            "userId5": 
                {
                    "video1": 1,

                },
            "userId6": 
                {
                    "video3": 4,

                },
            "userId4": 
                {
                    "video3": 2,

                }
        } 
        
        #sample2 ratings ################################       
        ratingsDictXXX={'3': {'86': 4.0}, '2': {'96': 5.0}}        
              
        #sample2 videos
        allvideosXXX=['86', '97', '96', '87']        
        #allvideos=[86, 87, 96, 97]#sorted
        
        #sample2 users ids
        allusersXXX=['3', '2']
        #allusers=[2, 3] #sorted
        #################################################
                
        #####Requirements linking ############################ 
        #all keys in dictionaries become strings types via str
        
        #ratings table given by users to videos
        ratingsDict=allUsersVideosIdsRatedDict       
       
        #all videos
        allvideos=allVideosIds      
       
        #all users
        allusers=allUsersIds
            
        #######################################################
        
        #dataframe from JSON
        trainDataRatingsPivot = pd.DataFrame.from_dict(ratingsDict, orient='index')
        #RENDER
        #trainDataRatingsPivot
        
        
        #2- Build Pivot table all users vs all videos        
        #dtype = [('Col1','int32'), ('Col2','float32'), ('Col3','float32')]

        #return header all videos
        allvideosType=[]
        for i in range(0,len(allvideos)):
            #allvideosType.append((str(allvideos[i]),'object'))
            allvideosType.append((str(allvideos[i]),'object'))

        #print(allvideosType)

        #columns header
        dtype = allvideosType
        numUsersVideosRated=len(allusers)
        values = np.zeros(numUsersVideosRated, dtype=dtype)

        #rows header       
        #print(len(allusers))
        
        index =allusers
        #df = pd.DataFrame(values, index=index)

        #dataframe matrix empty
        matrixDfempty = pd.DataFrame(values, index=index)
        #RENDER
        #matrixDfempty
        
        
        ########################
        
        #JOIN PIVOT TABLES
        #3- then join pivot tables in 1 and 2
        #place rating values in matrix empty
        
        #update table df2 
        #df2.update(df1)
        #df2
        #update table matrixSparseDf
        matrixDfempty.update(trainDataRatingsPivot)

        # final matrixSparseDf UPDATED
        matrixSparseDf=matrixDfempty
        #render
        #print("sparse matrix size users Ids,videos Ids" +str(matrixSparseDf.shape))
        #print("sparse matrix")
        #matrixSparseDf
                
        #Pearson correlation for Similarity
        #require:take 2 series objects 
        #return pearson correlation
        def pearsonCorrelation(s1,s2):            
            s1_cor=s1-s1.mean()
            s2_cor=s2-s2.mean()
            #Pearson correlation math formula to compute similarity
            cor=np.sum(s1_cor * s2_cor)/np.sqrt(np.sum(s1_cor ** 2) * np.sum(s2_cor ** 2))            
           
            #if(np.isnan(cor)):
                #return 0
            return cor
        
        #tests
        #meanTest1=matrixSparseDf['video1'].mean() #works
        
        #test Pearson correlation fn
        #testCor1=pearsonCorrelation(matrixSparseDf["video1"],matrixSparseDf["video2"])

        
        #print all columns means
        #for titleId in matrixSparseDf.columns:
        #print(titleId)
        #print (matrixSparseDf[titleId].mean())
        
        
        #function get_recommendations
        # @ensure recommendations as array
        #function to find strong correlated videos Ids to be recommended
        #videoId to test others, M sparse matrix , num of top recommendations
        def get_recommendations(videoIdIn,M,numRecomendations):

            #store recommended results
            recommendedArray=[]

            #scan all videos vy M.columns definition
            for titleId in M.columns:
                #check other than the same title
                if titleId == videoIdIn:
                    continue            
                cor=pearsonCorrelation(M[videoIdIn],M[titleId])
                #print(cor)
                
                if np.isnan(cor):
                    #if not correlation or nan value, ignore it
                    continue        
                else:
                    recommendedArray.append((titleId,cor))
                    #print(recommendedArray)                    
                    
            recommendedArray.sort(key=lambda tup:tup[1],reverse=True)
            #result
            return recommendedArray[:numRecomendations]

        #Test for 5 top recommendations max
        #recsTest1=get_recommendations("video1",matrixSparseDf,5)
        #print("Recommended video Ids:")
        #print(recsTest1)    
                
        #######################################################
        #Return recommendation result to send to client
        
        #parameters - inputs
        #videoClickedUser="video1" # arg input--find correlated videos for this video
        #test with video user Id 96
        videoClickedUser="96" # arg input--find correlated videos for this video
        maxNumTopRecommended=5  # arg input--max num of recommended videos
        
        #Apply Function get_recommendation   
        #recsTest1=get_recommendations("video1",matrixSparseDf,5)
        
        recommendIdsClickedUserSimilarsArray=get_recommendations(videoClickedUser,matrixSparseDf,maxNumTopRecommended)
        
        ########### End <recommender computation>##############
        
        ###############################################################
        ################################################################
        
        #test fn getRating()   params: dict videoratings, userId, videoId
        sofiaRatingVideo96=getRating(allUsersVideosIdsRatedDict,"2","96")
        
        numUsers=' . Number of users in DB'+str(numberOfUsers)
        
        ##### OUTPUT Response to client as JSON object ####################################################
        
        #return jsonify({'success':'true','name':allUsersVideosIdsRatedDict})  # !works
        #return jsonify({'success':'true','name':sofiaRatingVideo96}) 
        #return jsonify({'success':'true','name':str(allUsersVideosIdsRatedDict)})  # !works             
        #return jsonify({'success':'true','name':str(matrixSparseDf)})  # !works
    
        return jsonify({'success':'true','recommendIdVideos':str(recommendIdsClickedUserSimilarsArray)})  # !works
    
        #return jsonify({'success':'true','name':str('[recommendIdsClickedUserSimilarsArray,recommendIdsClickedUserSimilarsArray]')}) 
    
        #return jsonify({'success':'true','name':str(sofiaRatingVideo96)})  # !works
    
        
        #####################################################################################
     
    except Exception as e:
        #Pass
        #render_template("500.html", error = str(e))
        return '<h3 style="color:purple;"> linkServicesOnline.com Flask web apps by Marbin <br> :( Sorry mate, please check arguments & try again :)'+'<br>check format:<br>apps.marbin3d.com/recommend  and json object</h3>'     
	

    
############### End recomment feature implementation GAME CLIPS WIS ##################  