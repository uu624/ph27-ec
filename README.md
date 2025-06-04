# PH27 EC

PH27 の授業で使う EC サイトサンプル

## 環境構築

### 事前準備

- XAMPP や MAMP は終了する
- このページの緑のボタン押す > Open with GithubDesktop
- 自分のPCの、好きなフォルダを選んで Clone する
- クローンされた ph27-ec のフォルダをVSCodeで開く
- おすすめされた拡張機能をインストール
- `.env.example` をコピーして、 `.env` という名前にする

### Windows

- ph27-ec のディレクトリでコマンドプロンプトを開く
- `wsl --install ubuntu`
- Docker Desktopを起動する
    - 設定 > Resources > WSL integration > Ubuntu にチェック

#### PHPのインストール

```
wsl -d ubuntu
sudo apt update && sudo apt upgrade && sudo apt autoremove
sudo apt install -y software-properties-common
sudo add-apt-repository -y ppa:ondrej/php
sudo apt update
sudo apt install -y php8.4 php8.4-dom
```

#### Composer のインストール

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```

#### apache の停止

```
sudo service apache2 stop
sudo systemctl disable apache2.service
```

### sail コマンドを使えるようにする

- Mac: vi ~/.zshrc
- Windows: vi ~/.profile

- 「i」キー押す
- カーソルを最後に移動して改行入れる
- 以下をコピペ

```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

- 「esc」キー押す
- 「:wq」を入力しエンター

### 以下から Mac も Windows も同じ

```
composer install
docker compose down -v
sail up
```

別のタブで同じフォルダを開く

```
sail artisan migrate
sail npm i
sail npm run dev
```

vite.config.js に追加

```
server: {
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true
        }
},
```

# TODO: windows だと遅すぎるので

/home 以下にソースコードを置く
その際のvscodeの設定を調べる

#### トラブルシューティング

- 何かエラーになった人は環境をリセット

    - docker compose down -v
    - sail build --no-cache
    - sail up

- VSCode で TypeScript のエラーが出る
    - Ctrl + P を開いて、`TypeScript: Select TypeScript Version...
    - Use Workspace を選択する
