var jam=document.getElementById('jam');
var menit=document.getElementById('menit');
var detik=document.getElementById('detik');

var waktu = setInterval(
    function waktu(){
        var d=new Date();  
        var h=d.getHours();
        var m=d.getMinutes();
        var s=d.getSeconds();
        if(h<10){
            h="0"+h;
        }
        if(m<10){
            m="0"+m;
        }
        if(s<10){
            s="0"+s;
        }
        jam.textContent=h;
        menit.textContent=m;
        detik.textContent=s;
    },1000
);
    
