var timer;
var i =0;
var youtubediv = new Array();
function listVideos(json,divid) {
    var ul = document.createElement('ul');
    ul.setAttribute('id', 'youtubelist');
    if(json.data.items){
        for (var i = 0; i < json.data.items.length; i++) {
            if(json.data.items[i].video){
                var entry = json.data.items[i].video;
            }else{
                var entry = json.data.items[i];
            }
            appendOptionLast('<a href="javascript:playVideo(\''+entry.id+'\',false,\''+addslashes(entry.title)+'\',true)"><img src="'+entry.thumbnail.sqDefault+'" onmouseout="mouseOutImage(this)" onmouseover="mousOverImage(this,\''+entry.id+'\',1)"></a><br />'+entry.title.substr(0,30)+'',entry.id,'ul1');
        }
    }else{
        divid.innerHTML = 'Sem resultados para a busca';
    }
}
var l = 1;
var youtubeInit = new Array();
function insertVideos(div,typ,q,results,start){
    start = start + 1;
    if(typ == "mostviewed")
        q = "Most Viewed";
    if(typ == "linked")
        q = "Most Linked";
    var script = document.createElement('script');
    if(typ == "search"){
        script.setAttribute('src', 'http://gdata.youtube.com/feeds/api/videos?q='+q+'&v=2&start-index='+start+'&max-results='+results+'&format=5&alt=jsonc&callback=youtubeInit['+l+']');
        if(document.title)
            document.title = "Search: "+q.replace("+"," ")+" - YouTube Fast Search";
    }
    if(typ == "hot"){
        script.setAttribute('src', 'http://gdata.youtube.com/feeds/api/standardfeeds/recently_featured?alt=jsonc&v=2&format=5&callback=youtubeInit['+l+']&start-index=1&max-results=50');
        if(document.title)
            document.title = "Recently Featured - YouTube Fast Search";
    }
    if(typ == "mostviewed"){
        script.setAttribute('src', 'http://gdata.youtube.com/feeds/api/standardfeeds/most_viewed?time=this_month&v=2&format=5&alt=jsonc&callback=youtubeInit['+l+']&start-index=1&max-results=50');
        if(document.title)
            document.title = "Most Viewed This Month - YouTube Fast Search";
    }
    if(typ == "linked"){
        script.setAttribute('src', 'http://gdata.youtube.com/feeds/api/standardfeeds/most_linked?time=this_month&v=2&format=5&alt=jsonc&callback=youtubeInit['+l+']&start-index=1&max-results=50');
        if(document.title)
            document.title = "Most Linked This Month - YouTube Fast Search";
    }
    if(typ == "user"){
        script.setAttribute('src', 'http://gdata.youtube.com/feeds/api/videos?author='+q+'&v=2format=5&&max-results='+results+'&alt=jsonc&callback=youtubeInit['+l+']');
    }
    if(typ == "playlist"){
        script.setAttribute('src', 'http://gdata.youtube.com/feeds/api/playlists/'+q+'/?&alt=jsonc&v=2&format=5&callback=youtubeInit['+l+']');
    }
    youtubeInit[l] = function(root) {
        listVideos(root,div);
    }
    script.setAttribute('id', 'jsonScript');
    script.setAttribute('type', 'text/javascript');
    document.documentElement.firstChild.appendChild(script);
}
var normalplayer = false;
var currentid = 0;
var size = 1;
function getPageSize(){
    var xScroll, yScroll;
    if (window.innerHeight && window.scrollMaxY) {
        xScroll = document.body.scrollWidth;
        yScroll = window.innerHeight + window.scrollMaxY;
    } else if (document.body.scrollHeight > document.body.offsetHeight){
        xScroll = document.body.scrollWidth;
        yScroll = document.body.scrollHeight;
    } else {
        xScroll = document.body.offsetWidth;
        yScroll = document.body.offsetHeight;
    }
    var windowWidth, windowHeight;
    if (self.innerHeight) { // all except Explorer
        windowWidth = self.innerWidth;
        windowHeight = self.innerHeight;
    } else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
        windowWidth = document.documentElement.clientWidth;
        windowHeight = document.documentElement.clientHeight;
    } else if (document.body) { // other Explorers
        windowWidth = document.body.clientWidth;
        windowHeight = document.body.clientHeight;
    }
    if(yScroll < windowHeight){
        pageHeight = windowHeight;
    } else {
        pageHeight = yScroll;
    }
    if(xScroll < windowWidth){
        pageWidth = windowWidth;
    } else {
        pageWidth = xScroll;
    }
    arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight)
    return arrayPageSize;
}
function addslashes(str) {
    if(str){
        str=str.replace(/\'/g,'\\\'');
        str=str.replace(/\"/g,'');
    }
    return str;
}
function stripslashes(str) {
    str=str.replace(/\\'/g,'\'');
    return str;
}
function setCookie(name, value, expires, path, domain, secure){
    document.cookie = name + "=" + escape(value) +
    ((expires) ? "; expires=" + expires.toGMTString() : "") +
    ((path) ? "; path=" + path : "") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
}
function getCookie(name){
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1)
    {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
    }
    var end = document.cookie.indexOf(";", begin);
    if (end == -1)
    {
        end = dc.length;
    }
    return unescape(dc.substring(begin + prefix.length, end));
}
function deleteCookie(name, path, domain)
{
    if (getCookie(name))
    {
        document.cookie = name + "=" +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}
//slider
//drag and drop
(function() {
    var Dom = YAHOO.util.Dom;
    var Event = YAHOO.util.Event;
    var DDM = YAHOO.util.DragDropMgr;
    YAHOO.example.DDApp = {
        init: function() {
            var rows=1,cols=3,i,j;
            for (i=1;i<cols+1;i=i+1) {
                new YAHOO.util.DDTarget("ul"+i);
            }
            for (i=1;i<cols+1;i=i+1) {
                for (j=1;j<rows+1;j=j+1) {
                    new YAHOO.example.DDList("li" + i + "_" + j);
                }
            }
        },
        showOrder: function() {
            var parseList = function(ul, title) {
                var items = ul.getElementsByTagName("li");
                var out = title + ": ";
                for (i=0;i<items.length;i=i+1) {
                    out += items[i].id + " ";
                }
                return out;
            };
            var ul1=Dom.get("ul1"), ul2=Dom.get("ul2"), ul3=Dom.get("ul3");
        //alert(parseList(ul1, "List 1") + "\n" + parseList(ul2, "List 2"));
        },
        switchStyles: function() {
            Dom.get("ul1").className = "draglist_alt";
            //Dom.get("ul2").className = "draglist_alt";
            Dom.get("ul3").className = "draglist_alt";
        }
    };
    YAHOO.example.DDList = function(id, sGroup, config) {
        YAHOO.example.DDList.superclass.constructor.call(this, id, sGroup, config);
        this.logger = this.logger || YAHOO;
        var el = this.getDragEl();
        Dom.setStyle(el, "opacity", 0.67); // The proxy is slightly transparent
        this.goingUp = false;
        this.lastY = 0;
    };
    YAHOO.extend(YAHOO.example.DDList, YAHOO.util.DDProxy, {
        startDrag: function(x, y) {
            // make the proxy look like the source element
            var dragEl = this.getDragEl();
            var clickEl = this.getEl();
            Dom.setStyle(clickEl, "visibility", "hidden");
            dragEl.innerHTML = clickEl.innerHTML;
            Dom.setStyle(dragEl, "color", Dom.getStyle(clickEl, "color"));
            Dom.setStyle(dragEl, "backgroundColor", Dom.getStyle(clickEl, "backgroundColor"));
            Dom.setStyle(dragEl, "border", "2px solid gray");
        },
        endDrag: function(e) {
            var srcEl = this.getEl();
            var proxy = this.getDragEl();
            // Show the proxy element and animate it to the src element's location
            Dom.setStyle(proxy, "visibility", "");
            var a = new YAHOO.util.Motion(
                proxy, {
                    points: {
                        to: Dom.getXY(srcEl)
                    }
                },
                0.2,
                YAHOO.util.Easing.easeOut
                )
            var proxyid = proxy.id;
            var thisid = this.id;
            // Hide the proxy and show the source element when finished with the animation
            a.onComplete.subscribe(function() {
                Dom.setStyle(proxyid, "visibility", "hidden");
                Dom.setStyle(thisid, "visibility", "");
            });
            a.animate();
        },
        onDragDrop: function(e, id) {
            // If there is one drop interaction, the li was dropped either on the list,
            // or it was dropped on the current location of the source element.
            if (DDM.interactionInfo.drop.length === 1) {
                // The position of the cursor at the time of the drop (YAHOO.util.Point)
                var pt = DDM.interactionInfo.point;
                // The region occupied by the source element at the time of the drop
                var region = DDM.interactionInfo.sourceRegion;
                var srcEl = this.getEl();
                var destEl = Dom.get(id);
                if(destEl.id == "ul2"){
                    //hack for playlist
                    var videoid = srcEl.id.replace("$", "");
                    loadNewVideo(videoid);
                }
                if(destEl.id == "ul3"){
                    var destDD = DDM.getDDById(id);
                    destEl.appendChild(this.getEl());
                    destDD.isEmpty = false;
                    DDM.refreshCache();
                    savePlaylist(destEl.id);
                }
            }
        },
        onDrag: function(e) {
            // Keep track of the direction of the drag for use during onDragOver
            var y = Event.getPageY(e);
            if (y < this.lastY) {
                this.goingUp = true;
            } else if (y > this.lastY) {
                this.goingUp = false;
            }
            this.lastY = y;
        },
        onDragOver: function(e, id) {
            var srcEl = this.getEl();
            var destEl = Dom.get(id);
            // We are only concerned with list items, we ignore the dragover
            // notifications for the list.
            if (destEl.nodeName.toLowerCase() == "li") {
                var orig_p = srcEl.parentNode;
                var p = destEl.parentNode;
                if (this.goingUp) {
                    p.insertBefore(srcEl, destEl); // insert above
                } else {
                    p.insertBefore(srcEl, destEl.nextSibling); // insert below
                }
                DDM.refreshCache();
            }
        }
    });
    Event.onDOMReady(YAHOO.example.DDApp.init, YAHOO.example.DDApp, true);
})();

function onYouTubePlayerReady(playerId) {
    normalplayer = document.getElementById("playerid");
    setInterval(updateNormalPlayerInfo, 100);
/*
slideit = YAHOO.widget.Slider.getHorizSlider("slider-bg","slider-thumb", 0, 200);
slideit.subscribe("change", function(offsetFromStart) {
var actualValue =this.getValue();
seekTo(actualValue);
});
*/
}
function cueNewVideo(id) {
    if (normalplayer) {
        normalplayer.cueVideoById(id);
    }
}
function updateNormalPlayerInfo() {
    time = getCurrentTime();
    dur = getDuration();
    //a hack is needed due to difference in dur and time value
    dur = dur - 1;
    if((time > dur) && dur> 1 && time > 1){
        stop();
        getNextPlaylist();
        if(document.title)
            document.title = "Next in playlist...";
    }
}
//var slideit;
function loadNewVideo(id) {
    //normlplayer = true;
    if (normalplayer) {
        currentid = id;
        normalplayer.loadVideoById(id);
    }
}
function getNextPlaylist(){
    var playlistplay = 0;
    var ul = document.getElementById("ul3");
    var items = ul.getElementsByTagName("li");
    for (i=0;i<items.length;i=i+1) {
        if(items[i].id == currentid){
            var p=i+1;
            if(items[p]){
                playlistplay = 1;
                loadNewVideo(items[p].id);
                break;
            }
        }
    }
    //get playlist if its filled
    if(playlistplay == 0 && items.length > 0)
        loadNewVideo(items[0].id);
}
function play() {
    if(normalplayer) {
        normalplayer.playVideo();
    }
}
function pause() {
    if (normalplayer) {
        normalplayer.pauseVideo();
    }
}
function stop() {
    if (normalplayer) {
        normalplayer.stopVideo();
    }
}
function getDuration() {
    if (normalplayer) {
        return normalplayer.getDuration();
    }
}
function getCurrentTime() {
    if (normalplayer) {
        return normalplayer.getCurrentTime();
    }
}
function seekTo(seconds) {
    if (normalplayer) {
        normalplayer.seekTo(seconds, true);
    }
}
function fullscreen() {
    if (normalplayer) {
        normalplayer.fullscreen();
    }
    alert('Click on the video player');
}
function appendOptionLast(text,id,ul){
    try{
        if(text && id && ul){
            var list = document.getElementById(ul);
            var newNode = document.createElement("li");
            newNode.setAttribute('id',id);
            newNode.innerHTML = text;
            list.appendChild(newNode);
            if(YAHOO.example && newNode != 'null')
                new YAHOO.example.DDList(newNode);
        }
    }catch(err){
    //Handle errors here
    }
}
function clearList(ul){
    var list = document.getElementById(ul);
    while (list.firstChild)
    {
        list.removeChild(list.firstChild);
    }
}
function mostViewed(){
    clearList('ul1');
    insertVideos('ul1','mostviewed','','20','0');
}
function mostLinked(){
    clearList('ul1');
    insertVideos('ul1','linked','','20','0');
}
function getHot(){
    clearList('ul1');
    insertVideos('ul1','hot','','15','0');
}
function makeRequest(page){
    clearList('ul1');
    var tags = encodeURI(document.getElementById('searchinput').value);
    insertVideos('ul1','search',tags,'50','0');
}
function getSearch(tags){
    clearList('ul1');
    insertVideos('ul1','search',encodeURI(tags),'50','0');
}
var imname;
var timer;
function mousOverImage(name,id,nr){
    if(name)
        imname = name;
    imname.src = "http://img.youtube.com/vi/"+id+"/"+nr+".jpg";
    imname.style.border = '3px solid orange';
    nr++;
    if(nr > 3)
        nr = 1;
    timer = setTimeout("mousOverImage(false,'"+id+"',"+nr+");",1000);
}
function mouseOutImage(name){
    if(name)
        imname = name;
    //make border back to greyish
    imname.style.border = '3px solid #333';
    if(timer)
        clearTimeout(timer);
}
function savePlaylist(id){
    //console.log('save: '+id);
    ul=YAHOO.util.Dom.get(id);
    var items = ul.getElementsByTagName("li");
    var new_playlist = "";
    for (i=0;i<items.length;i=i+1) {
        new_playlist += ""+items[i].id + "|";
    }
    var time = new Date("July 21, 2015 01:00:00")
    //console.log('data: '+new_playlist);
    setCookie('playlist',new_playlist,time);
}
function createPlaylist(){
    //console.log('load');
    var playlist = getCookie('playlist');
    if (playlist=="" || playlist==null){
    //console.log('no playlist');
    }else{
        //console.log('playlist');
        var col_array=playlist.split('|');
        var part_num=0;
        while (part_num < col_array.length){
            if (col_array[part_num]=='null' || col_array[part_num]==''){
            }else{
                appendOptionLast('<a href="javascript:playVideo(\''+col_array[part_num]+'\',false,\'drag and drop video\')"><img src="http://img.youtube.com/vi/'+col_array[part_num]+'/2.jpg" onmouseout="mouseOutImage(this)" onmouseover="mousOverImage(this,\''+col_array[part_num]+'\',1)"></a>',col_array[part_num],'ul3');
            }
            part_num+=1;
        }
    }
}
function clearPlaylist(){
    //console.log('clear: '+id);
    deleteCookie('playlist');
    clearList('ul3');
}
var firsttime = true;
function playVideo(id,loader,title,clearer){
    if(document.title)
        document.title = title;
    loadNewVideo(id);
}
YAHOO.util.Event.onDOMReady(getHot);
YAHOO.util.Event.onDOMReady(createPlaylist); 