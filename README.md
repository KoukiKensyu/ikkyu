# 一休プロジェクト

## 開発手順
### 1. インストール
- フォルダを新規作成
-  フォルダを右クリックし、`Git Bash Here`を選択
-  `git clone https://github.com/KoukiKensyu/ikkyu.git` を実行
-  ikkyuフォルダ内で`compose install`を実行
-  `php artisan key:generate`を実行
- `php artisan config:cache`を実行
- `php artisan serve`でウェブサイトが閲覧できるか確認


### 2. メンバーの変更を自分のPCに取り込む
-  `git pull origin main` を実行
   この際にメンバーの変更と自分の変更が被ってしまった場合はコンフリクトが発生するので`4.`を参考に修正
- できればこまめに行うほうがいいが、いちいちコンフリクトを直すのも面倒なのでプッシュする前に行いまとめてコンフリクト修正してもいい


### 3. 実装の仕方
- `git checkout -b feature/修正の記述`で自分の修正を行うブランチを作成
- 実装を行う
- `git add filename`で変更内容をコミットできるようにする。(ファイル名指定が面倒くさい場合は
`git add .`で変更をすべて追加できる)
- `git commit -m "message"`で変更をローカルレポジトリにコミットする
- `git push origin feature/修正の記述` でローカルブランチをリモートにプッシュする
- githubに行き、`Compare & pull request`のボタンを押しプルリクエストを行う
- メンバーのチェックが終わったらマージして終了

### 4. コンフリクトが発生したら
- まずコンフリクトしたメンバーに報告
- コンフリクトしたファイルを二人で確認し、二人が満たしたかった要件が両方満たせるように修正
```php
// 変更前
<?php
<<<<HEAD
    echo "メンバー1の変更";
====
    echo "メンバー2の変更";
>>>>feature/change
?>

// 変更後
<?php
    echo "メンバー1の変更";
    echo "メンバー2の変更";
?>

```
- `3.`を参考にして変更をリモートレポジトリにプッシュする
