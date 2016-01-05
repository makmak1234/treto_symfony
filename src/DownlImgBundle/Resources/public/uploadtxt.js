function uploadtxt(filetxt){
	params = "?filetxt=" + filetxt + "&nocache1=" + Math.random() * 1000000;;
	request = new ajaxRequest();
	request.open("GET", "uploadajx.php" + params, true);//basketbigclear.php
	request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null)
				{
					window.parent.document.getElementById("myajax").style.display="none";
					var dstrex = new Array();
					par = window.document.getElementById("content");
					var parall;
					txtreply = this.responseText;
					myreply = JSON.parse(txtreply);			
					dstrex = myresize(myreply, "add");
					for(i = 0; i < dstrex.length; i++){		
						mydiv = document.createElement("div");
						mydiv.className = "divimg";
						myimg = document.createElement("img");
						myimg.src =  "./imagesw/" + myreply[i][0];
						mydiv.style.width = dstrex[i].toString() + "px";
						mydiv.appendChild(myimg);
						wx = Math.floor((dstrex[i] - myreply[i][1])/2);
						myimg.style.left = wx.toString() + "px";
						mydiv.style.margin = "5px";
						par.appendChild(mydiv);
					}
					this.abort(null)
				}
				else alert("Ajax error: No data received")
			}
			else{
				uploadtxt()
			} 
		}
	}
	request.send();
}

function uploadstart(filetxt){
	uploadtxt(filetxt);
}

function myunload(){
	query = "uploadtxt.php?deltxt=yes";
	window.location.href = query;
}

function myresize(myreply, act){
	var par = window.document.getElementById("content");
	winrsz(par);
	var divimq = par.getElementsByTagName("div");
	var imgimg = par.getElementsByTagName("img");
	var myimg = new Array();
	var iact = 0;
	var actall = 0;
	if(act = "add" && imgimg.length > 0){
	var topiend = imgimg[imgimg.length-1].getBoundingClientRect().top;
	while(topiend == imgimg[imgimg.length-iact-1].getBoundingClientRect().top){
			myimg[iact] = imgimg[imgimg.length-iact-1].offsetWidth;
			iact++;
		}
		myimg.reverse();
		actall = iact;
	}
	for(var i=0; i<myreply.length; i++){
		myimg[iact] = myreply[i][1];//ширина картинок фиксированная
		iact++;
	}
	//alert("myimg =" + myimg);
	
	dstrex = mydstrex(myimg, par);//рассчет размеров div
	
	j = 0;
	for(i = (divimq.length - actall); i < divimq.length; i++){
		divimq[i].style.width = dstrex[j].toString() + "px";
		wx = Math.floor((dstrex[j] - myimg[j])/2);
		imgimg[i].style.left = wx.toString() + "px";
		j++;
	}
	dstrex.splice(0, actall);
	//alert("dstrex =" + dstrex);
	
	return dstrex;
}

function drsize(){
	var par = window.document.getElementById("content");
	winrsz(par);
	var divimq = par.getElementsByTagName("div");
	var imgimq = par.getElementsByTagName("img");
	var myimg = new Array();
	for(var i=0; i<divimq.length; i++){
		myimg[i] = imgimq[i].offsetWidth;//работает
	}
	dstrex = mydstrex(myimg, par);	
	//alert("dstrex.length =" + dstrex.length + "dstrex =" + dstrex);
	for(i = 0; i < dstrex.length; i++){
		divimq[i].style.width = dstrex[i].toString() + "px";
		wx = Math.floor((dstrex[i] - myimg[i])/2);
		imgimq[i].style.left = wx.toString() + "px";
	}
}

function winrsz(par){
	var mywin = window.innerHeight;
	var mycont = par.offsetHeight;
	//alert("mywin =" + mywin + "mycont =" + mycont);
		var hcont = Math.floor(mywin*1.1);
		par.style.minHeight = hcont.toString() + "px";
}

function mydstrex(myimg, par){
	var divcont = par.offsetWidth - 2;// работает
	var dstrex = new Array();
	var j = 0;
	//alert("divcont =" + divcont + "clientWidth" + par.clientWidth);
	while(j < myimg.length){
		var divstr = 0;
		var i = j;
		var k = 0;
		while((divstr < divcont) && (j < myimg.length)){
			k++;
			divstr += myimg[j] + 10;//сколько изначально занимает px
			j++;
		}
		var rfact = 1;
		if(divstr > divcont){
			rfact = (divstr - 10*k)/(divcont - 10*k);//коэфф уменьш
		}
		ifact = i;
		var len = 0;
		while((ifact < j)  && (ifact < myimg.length)){
			dstrex[ifact] = Math.floor(myimg[ifact]/rfact);//массив подогнанных размеров
			len += dstrex[ifact] + 10;
			ifact++;
		}
		//alert("len = " + len);
		var delt = divcont - len;//догнать ровно до пикселя
		if((delt) < 20 ){
			while(delt > 0){
				dstrex[ifact-1-delt]++;
				delt--;
			}
		}
	}
	return dstrex;
}

function myunload1(){
	query = "uploadtxt.php?deltxt=yes";
	window.location.href = query;
}

function ajaxRequest()
{
	try
	{
		var request = new XMLHttpRequest()
	}
	catch(e1)
	{
		try
		{
			request = new ActiveXObject("Msxml2.XMLHTTP")
		}
		catch(e2)
		{
			try
			{
				request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch(e3)
			{
				request = false
			}
		}
	}
	return request
}