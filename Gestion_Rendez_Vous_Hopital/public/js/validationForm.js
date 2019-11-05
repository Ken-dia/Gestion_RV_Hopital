    $(function(){
        $('#submit').click(function(){
            valid = true;
            //NOM
            
            if($('#nom').val() == "")
            {
                $('#nom').next('.error-message').fadeIn().text('Veuillez entrer votre nom').addClass('invalid-feedback');
                valid = false;
            }
            else if(!$('#nom').val().match(/^[a-z]+$/i))
            {
                $('#nom').next('.error-message').fadeIn().text('Veuillez entrer un nom valide').addClass('invalid-feedback');
                    valid = false;
            }
            else
            {
                $('#nom').next('.error-message').fadeOut();
            }
            //Prenom
            if($('#prenom').val() == "")
            {
                $('#prenom').next('.error-message').fadeIn().text('Veuillez entrer votre prenom').addClass('invalid-feedback');
                valid = false;
            }
            else if(!$('#prenom').val().match(/^[a-z].+/i))
            {
                $('#prenom').next('.error-message').fadeIn().text('Veuillez entrer un prenom valide').addClass('invalid-feedback');
                valid = false;
            }
            else
            {
                $('#prenom').next('.error-message').fadeOut();
            }
            //EMAIL
            if($('#email').val() == "")
            {
                $('#email').next('.error-message').fadeIn().text('Veuillez entrer votre email').addClass('invalid-feedback');
                valid = false;
            }
            else if(!$('#email').val().match(/[\w.-]+@[\w.-]+\.[a-z]{2,6}/))
            {
                $('#email').next('.error-message').fadeIn().text('Veuillez entrer un email valide').addClass('invalid-feedback');
                valid = false;
            }
            else
            {
                $('#email').next('.error-message').fadeOut();
                
            }
            //TELEPHONE     
            if($('#tel').val() == "")
            {
                $('#tel').next('.error-message').fadeIn().text('Veuillez entrer N ° telephone').addClass('invalid-feedback');
                valid = false;
            }
            
            else if(!$('#tel').val().match(/^7[0,6,7,8]([0-9]){7}$/))
            {
                $('#tel').next('.error-message').fadeIn().text('Veuillez entrer un N ° telephone valide').addClass('invalid-feedback');
                valid = false;
            }
            else
            {
                $('#tel').next('.error-message').fadeOut();
            }
             
            //DATE DE NAISSANCE
           
            if($('#dateNaiss').val() == "")
            {
                $('#dateNaiss').next('.error-message').fadeIn().text('Veuillez entrer la Date').addClass('invalid-feedback');
                valid = false;
            }
            else
            {
                $('#dateNaiss').next('error-message').fadeOut();
            }
        return valid;
        });
        
        $('#valider').click(function()
        {
        resultat = true;
        //Tableau contenant l'ensemble des heures valides pour le RV
        var tabHeureValide = ['08:00','08:15','08:30','08:45','09:00','09:15','09:30','09:45','10:00','10:15','10:30','10:45',
        '11:00','11:15','11:30','11:45','12:00','12:15','12:30','12:45','15:00','15:15','15:30','15:45',
        '16:00','16:15','16:30','16:45'
        ];
        //Function permettant de verifier la validité de Date de RV par rapport à la date actuelle
        function dateValide(date_RV)
        {
            bol =true;
            var tabDate = date_RV.split("-");
            var fullDate = new Date();
            if(fullDate.getFullYear() == Number(tabDate[0]))
            {
                if(fullDate.getMonth() === Number(tabDate[1])-1)
                {
                    if(fullDate.getDate() <= Number(tabDate[2]))
                    {
                       bol = true;
                    }
                    else
                    {
                        bol=false; 
                    }
                }
                else if(fullDate.getMonth() < Number(tabDate[1])-1)
                {
                   bol = true;
                }
                else
                {
                    bol = false;
                }
                
            }
            else if(fullDate.getFullYear() < Number(tabDate[0]))
            {
                bol = true;

            }
            else
            {
                bol=false;
            }
            return bol;
        }
        function jourValide(date_RV)
        {
            var tabDate = date_RV.split("-");
            mondate = new Date(tabDate[0],tabDate[1]-1,tabDate[2]);
            jour = mondate.getDay();
            return jour;

        }
        //DATE RV
        if($('#date_RV').val() == "")
        {
            $('#date_RV').next('.error-message').fadeIn().text('Veuillez entrer la Date de RV').addClass('invalid-feedback');
            resultat = false;
        }
        else
        {
           bol = dateValide($('#date_RV').val());
            if(bol === false)
            {
                $('#date_RV').next('.error-message').fadeIn().text('Veuillez entrer une Date de RV valide').addClass('invalid-feedback');
                resultat = false;
            }
            else
            {
                jour = jourValide($('#date_RV').val());
                if(jour == 0 || jour == 6)
                {
                    $('#date_RV').next('.error-message').fadeIn().text('Veuillez choisir un jour de RV valide').addClass('invalid-feedback');
                    resultat = false;  
                }
                else
                {
                    $('#date_RV').next('error-message').fadeOut();
                }
            }
        }
        if($('#heure_RV').val() == "")
        {
            $('#heure_RV').next('.error-message').fadeIn().text('Veuillez entrer une heure de RV').addClass('invalid-feedback');
            resultat = false;
        }
        else
        {
            position = $.inArray($('#heure_RV').val(),tabHeureValide);
            if(position < 0)
            {
                $('#heure_RV').next('.error-message').fadeIn().text('Veuillez entrer une heure de RV valide').addClass('invalid-feedback');
                resultat = false;
            }
            else
            {
                $('#heure_RV').next('error-message').fadeOut();
            }
        }
        //SERVICE
        return resultat;
    });
    $('#ok').click(function()
    {
        var result = true;
        if($('#specialite').val() == "")
        {
            $('#specialite').next('.error-message').fadeIn().text('Veuillez entrer une specialite').addClass('invalid-feedback');
            result = false;
        }
        else if(!$('#specialite').val().match(/^[a-z].+$/i))
        {
            $('#specialite').next('.error-message').fadeIn().text('Veuillez entrer une specialite valide').addClass('invalid-feedback');
            result = false;
        }
        else
        {
            $('#specialite').next('.error-message').fadeOut();
        }
        return result;
    });
    $('#connecter').click(function()
    {
        resultat =true;
        if($('#login').val() == "")
        {
            $('#login').next('.error-message').fadeIn().text('Veuillez entrer votre login').addClass('invalid-feedback');
            resultat = false;
        }
        else if(!$('#login').val().match(/^[a-z].+$/i))
        {
            $('#login').next('.error-message').fadeIn().text('Veuillez entre un login valide').addClass('invalid-feedback');
            resultat = false;
        }
        else
        {
            $('#login').next('.error-message').fadeOut();
        }
        if($('#pass').val() == "")
        {
            $('#pass').next('.error-message').fadeIn().text('Veuillez entrer votre mot de passe').addClass('invalid-feedback');
            resultat = false;
        }
        else
        {
            $('#pass').next('.error-message').fadeOut();
        }
        if($('#passConfirm').val() == "")
        {
            $('#passConfirm').next('.error-message').fadeIn().text('Veuillez confirmer votre mot de passe').addClass('invalid-feedback');
            resultat = false;
        }
        else if($('#passConfirm').val() != $('#pass').val())
        {
            $('#passConfirm').next('.error-message').fadeIn().text('Veuillez entrer un mot de passe identique').addClass('invalid-feedback');
            resultat = false;
        }
        else
        {
            $('#passConfirm').next('.error-message').fadeOut();
        }

        return resultat;

    });
    $('#connect').click(function()
    {
        resultat =true;
        if($('#login').val() == "")
        {
            $('#login').next('.error-message').fadeIn().text('Veuillez entrer votre login').addClass('invalid-feedback');
            resultat = false;
        }
        else if(!$('#login').val().match(/^[a-z].+$/i))
        {
            $('#login').next('.error-message').fadeIn().text('Veuillez entre un login valide').addClass('invalid-feedback');
            resultat = false;
        }
        else
        {
            $('#login').next('.error-message').fadeOut();
        }
        if($('#pass').val() == "")
        {
            $('#pass').next('.error-message').fadeIn().text('Veuillez entrer votre mot de passe').addClass('invalid-feedback');
            resultat = false;
        }
        else
        {
            $('#pass').next('.error-message').fadeOut();
        }

        return resultat;

    });

    $('#recherche').click(function(){
        valeur = true;
        if ($('#mot').val() == "")
        {
            $('#mot').next('.error-message').fadeIn().text('Veuillez entrer un mot').addClass('invalid-feedback');
            valeur = false;
        }
        else if(!$('#mot').val().match(/^[a-z].+$/i))
        {
            $('#mot').next('.error-message').fadeIn().text('Veuillez entrer un mot valide').addClass('invalid-feedback');
            valeur = false;
        }
        else
        {
            $('#mot').next('.error-message').fadeOut();
        }
        return valeur;
    });
    $('#planning').click(function(){
        valeur = true;
        if ($('#mot').val() == "")
        {
            $('#mot').next('.error-message').fadeIn().text('Veuillez entrer un mot').addClass('invalid-feedback');
            valeur = false;
        }
        else if(!$('#mot').val().match(/^[a-z].+$/i))
        {
            $('#mot').next('.error-message').fadeIn().text('Veuillez entrer un mot valide').addClass('invalid-feedback');
            valeur = false;
        }
        else
        {
            $('#mot').next('.error-message').fadeOut();
        }
        return valeur;
    });
    $('#planningRV').click(function(){
        valeur = true;
        if ($('#motPlanning').val() == "")
        {
            $('#motPlanning').next('.error-message').fadeIn().text('Veuillez entrer un mot').addClass('invalid-feedback');
            valeur = false;
        }
        else if(!$('#motPlanning').val().match(/^[a-z].+$/i))
        {
            $('#motPlanning').next('.error-message').fadeIn().text('Veuillez entrer un mot valide').addClass('invalid-feedback');
            valeur = false;
        }
        else
        {
            $('#motPlanning').next('.error-message').fadeOut();
        }
        return valeur;
    });
    $('#rechercheRV').click(function(){
        valeur = true;
        if ($('#mot').val() == "")
        {
            $('#mot').next('.error-message').fadeIn().text('Veuillez choisir une Date').addClass('invalid-feedback');
            valeur = false;
        }
        else
        {
            $('#mot').next('.error-message').fadeOut();
        }
        return valeur;
    });
});