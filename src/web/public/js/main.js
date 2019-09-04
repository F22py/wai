function create_element(){
	var newDiv = document.createElement("div");
  newDiv.innerHTML = '<iframe width="560" height="315" src="https://www.youtube.com/embed/WaeBKznFvHs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

    var parent_element = document.getElementById('1st_news');
    var text = parent_element.getElementsByClassName('text_min')[0];
    var img = parent_element.getElementsByTagName('img')[0];
    text.replaceChild(newDiv, img);
}

var news_to_change = document.getElementsByClassName('news')[1];

news_to_change.getElementsByClassName('title')[0].innerText = "Verstappen nie panuje nad emocjami. 'To nie był budujący widok'";
news_to_change.getElementsByClassName('title')[0].href = "news/2_new";
news_to_change.getElementsByClassName('text_min')[0].innerText = "Verstappen pokazał, że nadal nie panuje nad emocjami - twierdzi Ross Brawn, dyrektor sportowy F1. \
Brytyjczyk sądzi, że Holender musi nadal pracować nad swoją postawą, \
jeśli chce w przyszłości zostać mistrzem świata.";

news_to_change.getElementsByClassName('read_more_link')[0].href="news/2_new";


create_element();
