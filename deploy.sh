#!/bin/bash
cd /home/u809435698/domains/kojaridingshop.com/public_html  # Navigate to your project directory
git pull origin main              # Pull the latest code from the main branch
composer install --ignore-platform-reqs # Install any new dependencies
php artisan migrate              # Run any new migrations (optional)
php artisan config:cache         # Clear and cache configurations (optional)
php artisan route:cache          # Cache routes (optional)  

# Log output for debugging
echo "Deployment completed successfully" >> /home/u809435698/domains/kojaridingshop.com/public_html/deploy.log
