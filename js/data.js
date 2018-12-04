function AvancaDias(lnDias, ldDia, ldMes, ldAno){

    var ndiasmes = "";
    var ltDia, ltMes, ltAno
    ltDia = ldDia;
    ltMes = ldMes;
    ltAno = ldAno;
    
    //31 dias
    if ((ldMes == 1) || (ldMes == 3) || (ldMes == 5) || (ldMes == 7) || (ldMes == 8) || (ldMes == 10) || (ldMes == 12)) {
        ndiasmes = 31
    }
    else 
        if ((ldMes == 4) || (ldMes == 6) || (ldMes == 9) || (ldMes == 11)) //30 dias
        {
            ndiasmes = 30
        }
        else //fevereiro
        {
            //Calcula ano bissexto
            if (((ldAno % 4) == 0) && ((ldAno % 100) == 0)) 
                ndiasmes = 29
            else 
                if ((ldAno % 400) == 0) 
                    ndiasmes = 29
                else 
                    ndiasmes = 28
        }    
    //incrementa dias
    if ((ldDia + lnDias) <= ndiasmes) {
        ltDia = ldDia + lnDias
    }
    else {
        ltDia = parseInt((ldDia + lnDias) % ndiasmes)
        
        if (parseInt(ldMes + ((ldDia + lnDias) / ndiasmes)) <= 12) {
            ltMes = parseInt(ldMes + ((ldDia + lnDias) / ndiasmes))
        }
        else {
            ltMes = parseInt((ldMes + ((ldDia + lnDias) / ndiasmes)) % 12)
            ltAno = parseInt(ldAno + ((ldMes + ((ldDia + lnDias) / ndiasmes)) / 12))
        }
    }
    if (ltMes.toString().length == 1) {
		ltMes = '0' + ltMes;
	}
    return  (ltDia + "/" + ltMes + "/" + ltAno)
}
