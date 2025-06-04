# PH27 EC

## 環境構築

- このリポジトリをクローンする
- `.env.example` をコピーして `.env` にする
- 事前に以下をインストールしておく
    - PHP
    - composer
    - node.js
        - nvm でインストールする

```
composer install
nvm use 22
npm i
php artisan migrate
composer run dev
```

## トラブルシューティング

- VSCode で TypeScript のエラーが出る
    - Ctrl + P を開いて、`TypeScript: Select TypeScript Version...
    - Use Workspace を選択する
