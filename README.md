# TodoProject-FuelPHP

## 構築手順

1. コンテナをビルドする

   ```bash
   docker compose build
   ```

2. FuelPHP プロジェクトを作成する

   ```bash
   docker compose run -u "$(id -u):$(id -g)" --rm fuel-app composer create-project fuel/fuel --prefer-dist .
   ```

3. コンテナを起動する

   ```bash
   docker compose up -d
   ```

4. ブラウザでアクセスする
   [http://localhost:8080](http://localhost:8080)

## プロジェクトについて

このプロジェクトは FuelPHP を使用した Todo アプリケーションです。
