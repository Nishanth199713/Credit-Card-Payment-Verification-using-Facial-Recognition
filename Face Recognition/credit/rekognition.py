import boto3
import sys
import os
BUCKET = "aronbucket2019"
user=sys.argv[1]
KEY_SAMP = sys.argv[2]
keyval=KEY_SAMP[8:]

KEY_TARGET = "samp.jpg"
keyk="c:\\xampp\\htdocs\\credit\\uploads\\"+keyval

s3 = boto3.resource('s3')

s3.Bucket(BUCKET).upload_file(keyk, "samp.jpg")

def compare_faces(bucket, key, bucket_target, key_target, threshold=80, region="ap-south-1"):
	rekognition = boto3.client("rekognition", region)
	response = rekognition.compare_faces(
	    SourceImage={
			"S3Object": {
				"Bucket": bucket,
				"Name": key,
			}
		},
		TargetImage={
			"S3Object": {
				"Bucket": bucket_target,
				"Name": key_target,
			}
		},
	    SimilarityThreshold=threshold,
	)
	return response['SourceImageFace'], response['FaceMatches']

flag=1	
toAdd=0
i=1	
while flag==1:
	c=""
	c+=str(i)
	cmd="aws s3 ls s3://aronbucket2019/"+user+"/"+user+c+".jpg"
	result=os.system(cmd)
	if(result==0):
		KEY_SOURCE=user+"/"+user+c+".jpg"
		source_face, matches = compare_faces(BUCKET, KEY_SOURCE, BUCKET, KEY_TARGET)
		x=0
		for match in matches:
			x=x+1
		if x>0:
			print "true"
			flag=0
			toAdd=1
			break
	else:
		flag=0
	i=i+1
if toAdd==0:
	s3.Bucket(BUCKET).upload_file(keyk,"unrecognised/fraud.jpg")
else:
	j=1
	flag2=1
	while flag2==1:
		c=""
		c+=str(j)
		cmd="aws s3 ls s3://aronbucket2019/"+user+"/"+user+c+".jpg"
		result=os.system(cmd)
		if(result==0):
			j=j+1
		else:
			flag2=0
	s=str(j)
	dir=""
	s1=str(user)
	dir=s1+"/"+s1
	dir=dir+s+".jpg"
	s3.Bucket(BUCKET).upload_file(keyk, dir)
	