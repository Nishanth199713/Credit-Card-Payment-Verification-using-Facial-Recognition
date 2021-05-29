import sys
import boto3

BUCKET = "aronbucket2019"
user=sys.argv[1]
KEY_SAMP = sys.argv[2]
keyval=KEY_SAMP[8:]
#KEY_SOURCE=user+"/"+user+"1.jpg"
#KEY_TARGET = "samp.jpg"
keyk="c:\\xampp\\htdocs\\credit\\uploads\\"+keyval

s3 = boto3.resource('s3')
picid=user+"/"+user+"1.jpg"
s3.Bucket(BUCKET).upload_file(keyk, "samp.jpg")

def detect_faces(bucket, key, attributes=['ALL'], region="ap-south-1"):
	rekognition = boto3.client("rekognition", region)
	response = rekognition.detect_faces(
	    Image={
			"S3Object": {
				"Bucket": bucket,
				"Name": key,
			}
		},
	    Attributes=attributes,
	)
	return response['FaceDetails']

count=0

for face in detect_faces(BUCKET, "samp.jpg"):
	count=count+1
if count==1:
	s3.Bucket(BUCKET).upload_file(keyk, picid)
	print "done"
else:
	print "error"