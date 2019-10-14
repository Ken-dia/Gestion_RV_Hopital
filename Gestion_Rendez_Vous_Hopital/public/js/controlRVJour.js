$(function(){
    $('#valider').click(function()
    {
        var tabHeureValide = ['08:00','08:15','08:30','08:45','09:00','09:15','09:30','09:45','10:00','10:15','10:30','10:45',
        '11:00','11:15','11:30','11:45','12:00','12:15','12:30','12:45','15:00','15:15','15:30','15:45',
        '16:00','16:15','16:30','16:45'
        ];
        
        valid = true;
       
        if($('#heure_RV').val() == "")
        {
            $('#heure_RV').next('.error-message').fadeIn().text('Veuillez entrer une heure de RV').addClass('invalid-feedback');
            valid = false;
        }
        else
        {
            position = $.inArray($('#heure_RV').val(),tabHeureValide);
            if(postion <0)
            {
                $('#heure_RV').next('.error-message').fadeIn().text('Veuillez entrer une heure de RV invalide').addClass('invalid-feedback');
                valid = false;
            }
            else
            {
                $('#heure_RV').next('error-message').fadeOut();
            }
        }
        if($('#date_RV').val() == "")
        {
            $('#date_RV').next('.error-message').fadeIn().text('Veuillez entrer la Date de RV').addClass('invalid-feedback');
            valid = false;
        }

        else
        {
            bol = dateValite($('#date_RV').val());
            if(bol === false)
            {
               
                $('#date_RV').next('.error-message').fadeIn().text('Veuillez entrer la Date de RV valide').addClass('invalid-feedback');
                valid = false;
            }
            else
            {
                jour = jourValide($('#date_RV').val());
                if(jour == 0 || jour == 6)
                {
                    $('#date_RV').next('.error-message').fadeIn().text('Veuillez choisir un jour de RV valide').addClass('invalid-feedback');
                    valid = false;  
                }
                else
                {
                    $('#date_RV').next('error-message').fadeOut();
                }
               
            }

            
        }
        
        return valid;
    });

    function dateValite(date_RV)
    {
        var bol = false;
        var tabDate = date_RV.split("-");
        var fullDate = new Date();
        if(fullDate.getFullYear() <= Number(tabDate[0]))
        {
            if(fullDate.getMonth() <= Number(tabDate[1]))
            {
                if(fullDate.getDate() <= Number(tabDate[2]))
                {
                    bol=true;
                }
                else
                {
                   bol=false; 
                }
            }
            else
            {
                bol=false;
            }
            
        }
        else
        {
            bol=false;
        }
        return bol;
    }
    
    
});
function jourValide(date_RV)
{
    var tabDate = date_RV.split("-");
    mondate = new Date(tabDate[0],tabDate[1]-1,tabDate[2]);
    jour = mondate.getDay();
    return jour;

}

$monday= new Date(Number(tabDate[0]),Number(tabDate[1])-1,Number(tabDate[2]));
jour = monday.getDay();
if(jour != 0 || jour != 6)
{
    bol = true;
}
else
{
    bol =false;
}
//Nom utilisateur :id11224488_admin
//Nom BD :id11224488_rv_hopital
//Hôte de BD:localhost