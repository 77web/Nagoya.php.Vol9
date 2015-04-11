# Nagoya.php vol9 プログラミング問題

出題 https://gist.github.com/qckanemoto/a35735da3e7000052fa5

## メモ

* TreeBuilderで [親子関係を設定するところ](https://github.com/77web/Nagoya.php.Vol9/blob/master/src/TreeBuilder.php#L26) で、既にどこかの子になった要素にさらに子（孫）を追加したとき反映するのかどうか自信がなかったが、 [テスト](https://github.com/77web/Nagoya.php.Vol9/blob/master/tests/TreeBuilderTest.php) 書いてみたらちゃんと反映されていて大丈夫だった。（多分オブジェクトのshallow copy辺りのおかげ）
* いつも取り組んでいる「どうかく」問題と違って、画面への出力結果（HTML/CLI）を確認するテストは書きにくいと実感した。
* ↑と逆に、入力値の例がPHPの配列で与えられているとテストのdataProvider書くのがいつもより楽だった。 :sweat_smile:
* ElementFactoryにTreeBuilderを持たせるか（プロパティとしてTreeBuilderを持つor一メソッドとしてTreeBuilderの機能を持たせる）迷った。
* 当初Treeの最上位を表す要素（画面出力や入力値の$dataには現れない）を独立のクラスとして持つかどうか迷ったが、OutputFormatterを実装しているときに配列でいいやと思ってそのままにした。（ [後藤さんの解答例](https://github.com/hidenorigoto/Nagoya.Dk9) ではRootNodeというクラスがある）
