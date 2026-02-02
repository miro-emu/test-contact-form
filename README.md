# Test Contact Form

Laravel を用いたシンプルなお問い合わせフォームのサンプルです。  
フォーム送信・バリデーション・確認画面・完了画面までの一連の流れを確認するためのテスト用リポジトリです。

---

## デモ構成

- 入力画面
- 確認画面
- 送信完了画面
- バリデーション表示

※ 実運用ではなく、学習・検証目的で作成しています。

---

## 使用技術

- PHP 8.5.0
- Laravel 8.83.29
- Blade
- Bootstrap
- MySQL 8.0.26

---

## 画面イメージ
<img width="711" height="421" alt="index" src="https://github.com/user-attachments/assets/8c8bdee8-f2bc-4c5b-8062-f07e5b72b11a" />



---

## セットアップ手順

```bash
git clone git@github.com:miro-emu/test-contact-form.git
cd test-contact-form
composer install
cp .env.example .env
php artisan key:generate# test-contact-form
