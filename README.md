# Koyob Car Rental - Simple Web App

## Build and Push to ECR

```bash
docker build -t koyob-car-rental .

aws ecr get-login-password --region your-region | docker login --username AWS --password-stdin your-account-id.dkr.ecr.your-region.amazonaws.com

docker tag koyob-car-rental:latest your-account-id.dkr.ecr.your-region.amazonaws.com/koyob-car-rental:latest
docker push your-account-id.dkr.ecr.your-region.amazonaws.com/koyob-car-rental:latest
```

## ECS (Fargate) Deployment
- Update your ECS Task Definition to use the new ECR Image URL.
- Pass `.env` variables as environment variables if needed.
- Make sure RDS security group allows access from ECS.

## S3 Setup
- Bucket must be created in advance.
- Add necessary IAM permissions to ECS Task Role for S3 access.