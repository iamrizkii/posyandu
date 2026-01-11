*Nama Controller & View Harus Sesuai Dengan Table Database

Seed DB
php artisan migrate:refresh --seed

Create Migration
php artisan make:migration create_name_table

Link Storage
php artisan storage:link

Symlink Hosting
ln -s /home/uname/sip/storage/app/public/post-images /home/uname/public_html/fitrazar.my.id/storage

ln -s /home/ponp5628/wa-api/storage/app/public/post-images /home/ponp5628/public_html/fitrazar.my.id/wa-api/storage