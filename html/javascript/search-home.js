//URLのパラメーターを取得
  let v = new URLSearchParams(window.location.search);
　//URLのパラメーターのうち検索されたキーワードを取得
  v = v.get('search-key');
　//検索したい全てのURLを配列に格納
  const urlLists = [
    "/eytys.html"];
  $.each(urlLists, function(i){
    $.ajax({
      url　: urlLists[i],
      dataType : 'html',
      success　: function(data){
　　　   //上記のURLからキーワードを探す
        if( $(data).find("#article").text().indexOf(v) !== -1){
　　　　　　//あれば、ページを表示する
          $('<li><a href="' + urlLists[i] + '">' +$(data).find("h1").text() + '</a></li>').appendTo('ul');
          }
        },
        error: function(data){
          console.log("error")
        }
 });
});
