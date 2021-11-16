# TodoList

## サイト概要
アカウントを作成して、タスクを投稿、編集、削除、できるアプリ。

### 開発した理由
ドメイン情報を中心としたアプリ開発をして体系的にドメイン駆動設計を理解したかったから。

## 開発環境
- Visual Studio Code
- 言語：PHP
- MySQL

## 機能一覧
- アカウント登録機能
- ログイン、ログアウト機能
- 投稿機能
- 編集機能
- 削除機能
- 検索機能
- 並び替え機能

## 実装にあたって
- Data Access Objectを使用してDBとのやりとりをする処理をクラスや関数にまとめた。
- Data Transfer Object　を使用してDBから持ってきた情報を連想配列から決まった型に入れ直した。
- Sessionに入ってある値をSingleton パターンを使って実装しどこからでも値を保持できるようにしている。
- Repositoryを使用してDTOのデータをエンティティーに詰め直すことで外の情報に依存しない設計にした。
