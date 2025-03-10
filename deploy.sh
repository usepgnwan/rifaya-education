#!/bin/bash
cd /home/u504186664/domains/rifayaeducation.com/public_html  # Navigate to your project directory 
git pull origin main              # Pull the latest code from the main branch
composer install --ignore-platform-reqs # Install any new dependencies
php artisan migrate              # Run any new migrations (optional)
php artisan config:cache         # Clear and cache configurations (optional)
php artisan route:cache          # Cache routes (optional)  

# Log output for debugging
echo "Deployment completed successfully running" >> /home/u504186664/domains/rifayaeducation.com/public_html/deploy.log 
