<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>体験登録</title>
    <style>
        h1 {
            font-size: 1.5em;
        }
    </style>
</head>

<body>
    <form action="event_create.php" method="POST">
        <fieldset>
            <legend>体験登録</legend>
            <p>*は必須項目です</p> <a href="event_read.php">イベント一覧画面(管理用)

            </a>

            <div>
                <h1>体験名*</h1>
                体験の魅力や内容が伝わるタイトルにしてください。24文字以下が推奨です。<br>
                <input type="text" name="event_name" placeholder="体験名を記入してください" size="100" maxlength="24">
            </div>

            <!-- 画像は保留 -->
            <!-- <div>
                メイン画像<br>
                検索結果に表示されます。ホストや体験の魅力が最も伝わる写真を1枚選んでください。幅1220px 高さ692px 以上が推奨です。<br>
                <input type="？？？" name="event_img">
            </div> -->



            <div>
                <h1>体験できること*</h1>
                体験の詳細を当日の流れとともに具体的に記述してください。自分なりのこだわりや体験への思いを伝えると効果的です。<br>
                <div>
                    このような構成で記入してみましょう <br>1.ゲストへのご挨拶 <br>2.タイムスケジュール <br>3.ゲストから来そうな質問に対する回答<br> 4.体験料金に含まれるもの（例：印刷費、材料代、場所代など）<br> 5.締めの一言<br>
                    <textarea name="event_detail" rows="10" cols="100"></textarea>
                </div>
            </div>

            <!-- <div>
                <h1>カテゴリー*</h1>
                <select name="event_category">
                    <option value="自然体験">自然体験</option>
                    <option value="ワークショップ">ワークショップ</option>
                    <option value="アート">アート</option>
                    <option value="グルメ・料理">グルメ・料理</option>
                    <option value="街歩き">街歩き</option>
                    <option value="アウトドアレジャー">アウトドアレジャー</option>
                    <option value="インドアレジャー">インドアレジャー</option>
                    <option value="その他">その他</option>
                </select>
            </div>

            <div>
                <h1>開催エリア*</h1>
                開催場所のエリアを選択してください。<br> -->
            <!-- 都道府県/市区町村/最寄駅のどのレベルでも設定できます。より細かいエリアを設定したほうが検索されやすくなります。<br> -->
            <!-- <select id="select-pref" name="pref">
                    <option value="">都道府県を選択してください</option>
                </select><br>
                <select id="select-city" name="city">
                    <option value="">市区町村を選択してください</option>
                </select>
            </div>

            <div>
                <h1>オンライン</h1>
                <input type="radio" name="remote_or_not" value="あり" checked="checked">あり<br>
                <input type="radio" name="remote_or_not" value="なし">なし<br>
                <input type="radio" name="remote_or_not" value="オンライン開催のみ">オンライン開催のみ<br>
            </div> -->

            <div>
                <h1>参加定員*</h1>
                <input type="number" name="how_many" min="1" max="100">人<br>
            </div>

            <div>
                <h1>体験にかかる時間*</h1>
                集合から解散までの時間を設定してください。(0.5時間単位)<br>
                <input type="number" name="how_long" step="0.5" min="0.5" max="100">時間<br>
            </div>


            <div>
                <h1>価格設定*</h1>
                体験の価格を設定してください。子供も参加できる体験の場合、必ず子供料金を設定ください。<br>
                <input type="number" name="how_much_adult" step="100" min="0">円<br>
                <!-- 子供料金設定<br>
                <input type="checkbox" name="child1" value="中高生"> <span>中高生</span><input type="number" name="how_much_child1" step="100" min="0">円<br>
                <input type="checkbox" name="child2" value="小学生"> <span>小学生</span><input type="number" name="how_much_child2" step="100" min="0">円<br>
                <input type="checkbox" name="child3" value="未就学児(3-6歳)"><span>未就学児(3-6歳)</span><input type="number" name="how_much_child3" step="100" min="0">円<br>
                <input type="checkbox" name="child4" value="乳幼児(0-2歳)"> <span>乳幼児(0-2歳)</span><input type="number" name="how_much_child4" step="100" min="0">円<br> -->

            </div>

            <!-- <div>
                <h1>予約期限</h1>
                予約を締め切る時間を設定してください。<br>
                <input type="date" name="limit_date"><input type="time" name="limit_time">
                <input type="radio" name="limit_hour" value="limit_hour" checked="checked">開催日時の12時間以内→開催日時の<input type="number" name="limit_hour_detail" min="1" max="12">時間前<br> -->
            <!-- <input type="radio" name="limit_date" value="limit_date">開催日の<input type="number" name="limit_date_num" min="1" max="30">日前の<input type="number" name="limit_date_time" min="0" max="24">時<br> -->
            <!-- </div> -->

            <!-- <div>
                <h1>予約確定期限</h1>
                予約期限と同じか前になるように設定してください。キャンセルポリシーについて、詳しくはこちらをご確認ください。<br>
                開催日の<input type="number" name="fix_date_num" min="1" max="30">日前の<input type="number" name="fix_date_time" min="0" max="24">時<br>
            </div> -->

            <div>
                <h1>開催成立人数</h1>
                開催成立人数を設定した場合、開催確定期限までに予約人数が満たないと自動的に開催中止となります<br>
                <input type="number" name="min_person" min="1">人<br>
            </div>


            <div>
                <button>登録</button>
            </div>

        </fieldset>
    </form>

    <!-- <script>
        // 参考サイト
        // https://lancers.work/pref-city-form-jquery-json/
        // 都道府県フォーム生成
        $(function() {
            $.getJSON("http://localhost/DEV8/php02_sample/work/pref_city.json", function(data) {
                for (var i = 1; i < 48; i++) {
                    var code = ('00' + i).slice(-2); // ゼロパディング
                    // console.log(code);
                    $('#select-pref').append('<option value="' + code + '">' + data[i - 1][code].pref + '</option>');
                }
            });
        });


        // 都道府県メニューに連動した市区町村フォーム生成
        $('#select-pref').on('change', function() {
            $('#select-city option:nth-child(n+2)').remove(); // ※1 市区町村フォームクリア
            var select_pref = ('00' + $('#select-pref option:selected').val()).slice(-2);
            var key = Number(select_pref) - 1;
            $.getJSON("http://localhost/DEV8/php02_sample/work/pref_city.json", function(data) {
                for (var i = 0; i < data[key][select_pref].city.length; i++) {
                    $('#select-city').append('<option value="' + data[key][select_pref].city[i].id + '">' + data[key][select_pref].city[i].name + '</option>');
                }
            });
        });
    </script> -->


</body>

</html>