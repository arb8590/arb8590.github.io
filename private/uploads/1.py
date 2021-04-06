from boto3.session import Session
import boto3

ACCESS_KEY = 'AKIAYUKS24DELDYQHOMP'
SECRET_KEY = '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'

session = Session(aws_access_key_id="AKIAYUKS24DEHZJ5GEIA",
              aws_secret_access_key="NcBiT8C9PNdXTjG+vjliENj/XR/EPeYGLDdCfG9v")
s3 = session.resource('s3')
your_bucket = s3.Bucket('roboticsalexburbano')

for s3_file in your_bucket.objects.all():
    print(s3_file.key) # prints the contents of bucket
your_bucket.download_file('main.py','./a.py')
