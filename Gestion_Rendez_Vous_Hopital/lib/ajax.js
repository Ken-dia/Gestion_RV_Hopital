function tel_suggestion()
{
    var tel = document.getElementById("num_tel").value;
    var xhr;
    if (window.XMLHttpRequest)
     { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var data = "tel_name=" + tel;
     xhr.open("POST", "lib/TelPatient.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 xhr.onreadystatechange = display_data;
    function display_data()
    {
     if (xhr.readyState == 4) 
     {
        if (xhr.status == 200)
        {
            //alert(xhr.responseText);	
            var mon_bloc =document.getElementById("suggestion")   
            mon_bloc.innerHTML = xhr.responseText;
            //Mon style
            mon_bloc.style.backgroundColor = "#7451EB"
            mon_bloc.style.color = "#F1F1F1";
            mon_bloc.style.maxHeight = "70px";
            mon_bloc.style.overflow = "auto";
            //
            //mes_liens = document.getElementsByName("lien")
            //mes_liens.style.color = "#F1F1F1";
            //mes_liens.style.textDecoration = "none";
            console.log(mon_bloc.style)
        } 
        else 
        {
            alert('Il y a un probléme sur la requete.');
        }
     }
    }
    if(num_tel.value.length != 9)
    {
        document.getElementById("id_patient").value = ""
    }
}
    mes_liens = document.getElementById("suggestion")
    mes_liens.addEventListener("click", function(e)
    {
        
        var my_classe = e.target.className
        if (my_classe === "lien")
        {
            if (e.target.innerHTML)
            {
                document.getElementById("num_tel").value = e.target.innerHTML;
                
                document.getElementById("id_patient").value = e.target.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
                mes_liens.innerHTML="";
                mes_liens.style.height = "0px";
                
            }
            else
            {
                document.getElementById("num_tel").value = e.target.textContent;
                document.getElementById("id_patient").value = e.target.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
                mes_liens.innerHTML="";

            }
        }
        e.preventDefault();
        e.stopPropagation();
    },false);
    