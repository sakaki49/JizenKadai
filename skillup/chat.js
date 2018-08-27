//ajax_get_data.phpからJSONデータを受け取ってHTMLを書き換える関数
function update(){
  //JSON形式のデータを読み込む
  //成功時、dataにJSONデータが格納されている
  $.getJSON("ajax_get_data.php", function(data){
    //htmlを組み立ててmainを書き換え
    var html = "";
    for(i = 0; i < data.length; i++){
      html += "<b>" + h(data[i]["name"]) + "</b> " + h(data[i]["message"]);
      html += " (" + h(data[i]["created"]) + ")<hr />";
    }
    $("#main").html(html);
  });
}

//HTMLエスケープをする関数
function h(text){
  return text.replace(/&/g,"&amp;").replace(/"/g,"&quot;").replace(/'/g,"&#039;").replace(/</g,"&lt;").replace(/>/g,"&gt;");
}

$(function(){
  //1秒ごとに読み込み
  setInterval(update, 1000);
  
  //発言ボタンを押したときの動作
  $("#submit").click(function(){
    //送信するデータを準備
    var data = {
      name: $("#name").val(),
      message: $("#message").val()
    };
    //POSTで送信
    //引数はURL, 送信するデータ, 成功時に実行される関数
    $.post("ajax_submit.php", data, update);
  });
});