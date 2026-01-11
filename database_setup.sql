-- ============================================
-- POSYANDU DATABASE SETUP SCRIPT
-- ============================================
-- Jalankan script ini di phpMyAdmin atau MySQL Client
-- untuk membuat database dan tabel yang diperlukan
-- ============================================

-- Buat database
CREATE DATABASE IF NOT EXISTS posyandu
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Gunakan database
USE posyandu;

-- ============================================
-- SETELAH MENJALANKAN SCRIPT INI:
-- ============================================
-- 1. Copy file .env.example menjadi .env
-- 2. Jalankan: php artisan key:generate
-- 3. Jalankan: php artisan migrate:fresh --seed
-- 4. Akses: http://localhost/posyandu-main/public/login
-- ============================================

-- LOGIN CREDENTIALS (setelah seeder):
-- Admin: admin@posyandu.com / password
-- Bidan: bidan@posyandu.com / password
-- Kader: kader@posyandu.com / password
