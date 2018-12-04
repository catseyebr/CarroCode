<?php header("Content-type: text/css"); 
$server_prefix_url = "http://".$_SERVER['HTTP_HOST']."";
?>
*, html {

    margin: 0;
    padding: 0;
    border: 0;
}
body {
    background-image: url(<?php echo $server_prefix_url;?>/images/bg_top.gif);
    background-position: top;
    background-repeat: repeat-x;
    background-color: #ffffff;
    font-family: Arial, Georgia, Verdana, Helvetica, sans-serif;
    font-size: 12px;
}
body.topo_internas{
    background-image: url(<?php echo $server_prefix_url;?>/images/bg_internas.gif);
    background-position: top;
    background-repeat: repeat-x;
    background-color: #ffffff;
    font-family: Arial, Georgia, Verdana, Helvetica, sans-serif;
    font-size: 12px;
}
body.topo_inter{
    background: none;
}
body.topo_processo{
    background-image: url(<?php echo $server_prefix_url;?>/images/bg_processo.gif);
    background-position: top;
    background-repeat: repeat-x;
    background-color: #ffffff;
    font-family: Arial, Georgia, Verdana, Helvetica, sans-serif;
    font-size: 12px;
}
#page{
    margin:0 auto;
    width:860px;
    display: block;
}
#page ul li {
    list-style: none;
}
div#page:after, div#topo:after, div#geral_pesquisa_mais:after, div#mais_reservados:after, div#box_como_fazer:after,
    div#geral_boxs:after, div#lista_indexacao:after, div#rodape:after, div#container_rodape:after, div#container_pesquisa:after,
        div#atende_termos:after, div#container_detalhes:after, div#geral_escolha:after, div#barra_processo:after,
            div#info_reserva:after, div#container_retirada_devolucao:after, div#lojas_seguro:after, div#add_protecao:after, div#container_botao:after,
                .paginacao_comparacao:after, .topo_locadoras:after,  div#container_blocos:after, .container_precos:after, .categorias_veiculos_main2:after {
        content:".";
        display:block;
        clear:both;
        visibility:hidden;
        height:0;
        overflow:hidden;
}
a	{
	outline:none;
}
/* ------------------------------------ IN�CIO HOME -------------------------------- */
div#topo{
    width: 860px;
    height: 87px;
    display: block;
}
    div#logomarca{
	width: 289px;
	height: 61px;
	display: block;
	float: left;
	margin-top: 14px;
    }
	div#logomarca h2{
	    width: 289px;
	    height: 61px;
	    display: block;
	    text-indent: -9000px;
	    background: url(<?php echo $server_prefix_url;?>/images/logomarca.jpg) no-repeat;
	    overflow: hidden;
	}
	    div#logomarca h2 a{
		width: 289px;
		height: 61px;
		display: block;
		float: left;
	    }
    div#icones_topo{
	width: 299px;
	height: 61px;
	display: block;
	float: right;
	margin-top: 14px;
    }
	div#icones_topo ul li{
	    display: inline;
	    float: left;
	    margin-left: 10px;
	}
	    div#icones_topo ul li a.minhas_reservas{
		width: 90px;
		height: 61px;
		display: block;
		background: url(<?php echo $server_prefix_url;?>/images/icon_reservas.jpg) no-repeat;
		text-indent: -9000px;
	    }
		div#icones_topo ul li a.minhas_reservas:hover {
		    width: 90px;
		    height: 61px;
		    display: block;
		    background: url(<?php echo $server_prefix_url;?>/images/icon_reservas_over.jpg) no-repeat;
		}
		    div#icones_topo ul li a.sac{
			width: 51px;
			height: 61px;
			display: block;
			background: url(<?php echo $server_prefix_url;?>/images/icon_sac.jpg) no-repeat;
			text-indent: -9000px;
		    }
			div#icones_topo ul li a.sac:hover {
			    width: 51px;
			    height: 61px;
			    display: block;
			    background: url(<?php echo $server_prefix_url;?>/images/icon_sac_over.jpg) no-repeat;
			}
			    div#icones_topo ul li a.chat{
				width: 59px;
				height: 61px;
				display: block;
				background: url(<?php echo $server_prefix_url;?>/images/icon_chat.jpg) no-repeat;
				text-indent: -9000px;
			    }
				div#icones_topo ul li a.chat:hover {
				    width: 59px;
				    height: 61px;
				    display: block;
				    background: url(<?php echo $server_prefix_url;?>/images/icon_chat_over.jpg) no-repeat;
				}
				    div#icones_topo ul li a.lojas{
					width: 49px;
					height: 61px;
					display: block;
					background: url(<?php echo $server_prefix_url;?>/images/icon_loja.jpg) no-repeat;
					text-indent: -9000px;
				    }
					div#icones_topo ul li a.lojas:hover {
					    width: 49px;
					    height: 61px;
					    display: block;
					    background: url(<?php echo $server_prefix_url;?>/images/icon_loja_over.jpg) no-repeat;
					}
/* ------------------------------------ IN�CIO TOOL TIP -------------------------------- */
#JT_arrow_left{
	background-image: url(<?php echo $server_prefix_url;?>/images/arrow_left.gif);
	background-repeat: no-repeat;
	background-position: left top;
	position: absolute;
	z-index:101;
	left:-12px;
	height:23px;
	width:10px;
	top:-3px;
}

#JT_arrow_right{
	background-image: url(<?php echo $server_prefix_url;?>/images/arrow_right.gif);
	background-repeat: no-repeat;
	background-position: left top;
	position: absolute;
	z-index:101;
	height:23px;
	width:11px;
    top:-2px;
}

#JT {
	position: absolute;
	z-index:100;
	border: 2px solid #4c4c4c;
	background-color: #f2f2f2;
	color: #ffffff;
	margin-top: 48px;
}

#JT_copy{
	padding:10px 10px 10px 10px;
	color:#000;
}

.JT_loader{
	background-image: url(<?php echo $server_prefix_url;?>/images/loader.gif);
	background-repeat: no-repeat;
	background-position: center center;
	width:100%;
	height:12px;
}

#JT_close_left{
	background-color: #4c4c4c;
	text-align: left;
	padding-left: 8px;
	padding-bottom: 5px;
	padding-top: 2px;
	font-weight:bold;
}

#JT_close_right{
	background-color: #4c4c4c;
	text-align: left;
	padding-left: 8px;
	padding-bottom: 5px;
	padding-top: 2px;
	font-weight:bold;
}

#JT_copy p{
margin:3px 0;
}

#JT_copy img{
	padding: 1px;
	border: 1px solid #CCCCCC;
}

.jTip{
cursor:help;
}

/* ------------------------------------ FIM TOOL TIP -------------------------------- */
div#menu_principal{
    width: 860px;
    height: 35px;
    display: block;
    clear: both;
}
    div#menu_principal ul.menu{
        width: 860px;
        height: 35px;
        display: block;
        background: url(<?php echo $server_prefix_url;?>/images/bg_menu.gif) repeat-x ;
    }
        div#menu_principal ul.menu li{
            display: inline;
            float: left;
        }
        div#menu_principal strong{
            color:#33CCFF;
        }
            div#menu_principal ul.menu li a.home{
                font-size: 12px;
                color: #ffffff;
                font-weight: bold;
                text-decoration: none;
                width: 44px;
                height: 25px;
                display: block;
                padding-left: 12px;
                padding-top: 9px;
            }
                div#menu_principal ul.menu li a.instituto{
                    font-size: 12px;
                    color: #ffffff;
                    font-weight: bold;
                    text-decoration: none;
                    width: 81px;
                    height: 25px;
                    display: block;
                    padding-left: 16px;
                    padding-top: 9px;
                }
                div#menu_principal ul.menu li a.locadoras{
                    font-size: 12px;
                    color: #ffffff;
                    font-weight: bold;
                    text-decoration: none;
                    width: 79px;
                    height: 25px;
                    display: block;
                    padding-left: 12px;
                    padding-top: 9px;
                }
                div#menu_principal ul.menu li a.categorias{
                    font-size: 12px;
                    color: #ffffff;
                    font-weight: bold;
                    text-decoration: none;
                    width: 75px;
                    height: 25px;
                    display: block;
                    padding-left: 12px;
                    padding-top: 9px;
                }
                div#menu_principal ul.menu li a.cidades{
                    font-size: 12px;
                    color: #ffffff;
                    font-weight: bold;
                    text-decoration: none;
                    width: 120px;
                    height: 25px;
                    display: block;
                    padding-left: 15px;
                    padding-top: 9px;
                }
                div#menu_principal ul.menu li a.gerais{
                    font-size: 12px;
                    color: #ffffff;
                    font-weight: bold;
                    text-decoration: none;
                    width: 110px;
                    height: 25px;
                    display: block;
                    padding-left: 9px;
                    padding-top: 9px;
                }
                div#menu_principal ul.menu li a.dicas{
                    font-size: 12px;
                    color: #ffffff;
                    font-weight: bold;
                    text-decoration: none;
                    width: 40px;
                    height: 25px;
                    display: block;
                    padding-left: 5px;
                    padding-top: 9px;
                }
                div#menu_principal ul.menu li a.noticias{
                    font-size: 12px;
                    color: #ffffff;
                    font-weight: bold;
                    text-decoration: none;
                    width: 63px;
                    height: 25px;
                    display: block;
                    padding-left: 9px;
                    padding-top: 9px;
                }
                div#menu_principal ul.menu li a.formas{
                    font-size: 12px;
                    color: #ffffff;
                    font-weight: bold;
                    text-decoration: none;
                    width: 140px;
                    height: 25px;
                    display: block;
                    padding-left: 9px;
                    padding-top: 9px;
                }
                div#menu_principal ul.menu li a.contato{
                    font-size: 12px;
                    color: #ffffff;
                    font-weight: bold;
                    text-decoration: none;
                    width: 62px;
                    height: 25px;
                    display: block;
                    padding-left: 12px;
                    padding-top: 9px;
                }
                
                div#menu_principal ul.menu li a.home:hover,
                    div#menu_principal ul.menu li a.instituto:hover,  div#menu_principal ul.menu li a.locadoras:hover,
                        div#menu_principal ul.menu li a.veiculos:hover, div#menu_principal ul.menu li a.gerais:hover,
                            div#menu_principal ul.menu li a.categorias:hover, div#menu_principal ul.menu li a.noticias:hover,
                            div#menu_principal ul.menu li a.formas:hover, div#menu_principal ul.menu li a.contato:hover, div#menu_principal ul.menu li a.cidades:hover, div#menu_principal ul.menu li a.dicas:hover {
                    background: #5d5d5d;
                }
                            div#menu_principal ul.menu li ul {
                                display: none;
                                position: absolute;
                                top: 120px;
                                left: 10;
                                background: #5d5d5d;
                                width: 200px;
                                padding-top: 10px;
                                z-index: 100;
			    }
                                div#menu_principal ul.menu li ul li {
                                    display: block !important;
                                    padding: 0 10px 10px 12px!important;
                                    margin: 0 !important;
                                    border: none !important;
                                    float: none !important;
                                    line-height: 10px !important;
				}
                                    div#menu_principal ul.menu li ul li a{
                                        font-size: 12px;
                                        color: #ffffff;
                                        text-decoration: none;
                                        height: 15px;
                                        padding: 3px;
                                        width: 180px;
                                    }
                                        div#menu_principal ul.menu li ul li a:hover{
                                            background-color: #0f69a7;
                                        }
    div#banner_publicidade{
        width: 860px;
        height: 115px;
        display: block;
        padding-top: 5px;
    }
        div#geral_pesquisa_mais{
            width: 860px;
            display: block;
            margin-top: 20px;
        }
            div#pesquisa_carros{
                width: 485px;
                height: 282px;
                display: block;
                float: left;
                background: #4b465a;
            }
                div#pesquisa_carros h3{
                    width: 470px;
                    height: 31px;
                    display: block;
                    background: #ffc600;
                    font-size: 20px;
                    font-weight: bold;
                    color: #ffffff;
                    padding-left: 15px;
                    padding-top: 6px;
                }
                .campo_maior{
		    border: 1px solid #5ca1be;
		    background: #ffffff;
		    font-family: Arial, Verdana, Helvetica, sans-serif;  
		    color:#0f69a6;
		    font-size: 12px;
		    width: 453px;
		    height: 20px;
                    padding-left: 5px;
                    padding-top: 3px;
		}
                .campo_menor{
		    border: 1px solid #5fccf6;
		    background: #ffffff;
		    font-family: Arial, Verdana, Helvetica, sans-serif;  
		    color:#0f69a6;
		    font-size: 12px;
		    width: 113px;
		    height: 20px;
                    padding-left: 5px;
                    padding-top: 3px;
		}
                .campo_selecao{
                    border: 1px solid #5fccf6;
                    background-color: #ffffff;
                    font-family: Arial, Verdana, Helvetica, sans-serif;  
                    color:#0f69a6;
                    font-size: 12px;
                    height: 25px;
                    width: 113px;
                    padding-top: 3px;
		}
                 .campo_categoria{
                    border: 1px solid #5fccf6;
                    background-color: #ffffff;
                    font-family: Arial, Verdana, Helvetica, sans-serif;  
                    color:#0f69a6;
                    font-size: 12px;
                    height: 25px;
                    width: 180px;
                    padding-top: 3px;
		}
                    div#pesquisa_carros table.form_busca{
                        color: #ffffff;
                        margin-left: 9px;
                        margin-top: 10px;
                        
                    }
                    div#pesquisa_carros table.devolucao{
                        margin-bottom: 8px;
                        
                    }
                        div#pesquisa_carros table span{
                            color: #fbcf00;
                            font-weight: bold;
                        }
    div#mais_reservados{
        width: 362px;
        height: 195px;
        display: block;
        float: right;
        background: url(<?php echo $server_prefix_url;?>/images/bg_reservados.gif) repeat-x top;
    }
        div#mais_reservados h3{
            width: 266px;
            height: 30px;
            display: block;
            float: left;
            font-size: 20px;
            color: #ffffff;
            padding-left: 15px;
            margin-top: 6px;
        }
            div#mais_reservados a.mais{
                width: 73px;
                height: 30px;
                display: block;
                float: right;
                font-size: 16px;
                color: #0033CC;
                font-weight: bold;
                margin-top: 8px;
            }
                div#mais_reservados a.mais:hover{
                    color: #000000;
                }
    div#depoimentos{
        width: 362px;
        height: 87px;
        display: block;
        float: right;
        background: #e5f5fc;
    }
        div#depoimentos h3{
            width: 346px;
            height: 31px;
            display: block;
            background: #92d9f4;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 15px;
            padding-top: 6px;
        }
            div#depoimentos p{
                width: 327px;
                height: 35px;
                display: block;
                font-size: 11px;
                color: #2e2e2e;
                font-style: italic;
                font-weight: bold;
                padding-left: 15px;
                padding-top: 10px;
            }
                div#depoimentos p span{
                    font-style: normal;
                    color: #0d85b4;
                    margin-left: 5px;
                    font-weight: bold;
                }
                    div#depoimentos p a{
                        font-style: normal;
                        color: #0d85b4;
                        margin-left: 5px;
                    }
                        div#depoimentos p a:hover{
                            color: #4a4a4a;
                        }
    div#box_requisitos{
        width: 280px;
        height: 330px;
        display: block;
        float: left;
        background: #2982a5;
        margin-top: 20px;
    }
        div#box_requisitos h3{
            width: 265px;
            height: 31px;
            display: block;
            background: #57b9df;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 15px;
            padding-top: 6px;
        }
            div#box_requisitos ul{
                display: block;
                padding-top: 6px;
                padding-left: 15px;
                width: 245px;
            }
                div#box_requisitos ul li{
                    color: #ffffff;
                    margin-top: 7px;
                }
    div#box_enquete{
        width: 280px;
        height: 330px;
        display: block;
        float: left;
        background: #f3f3f3;
        margin-top: 20px;
        margin-left: 10px;
    }
         div#box_enquete h3{
            width: 265px;
            height: 31px;
            display: block;
            background: #1bb2ec;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 15px;
            padding-top: 6px;
         }
            div#box_enquete ul{
                display: block;
                padding-top: 15px;
                padding-left: 15px;
                width: 245px;
            }
                div#box_enquete ul li{
                    color: #0f69a6;
                    margin-top: 7px;
                }
                .campo_enquete{
		    border: 1px solid #5fccf6;
		    background: #ffffff;
		    font-family: Arial, Verdana, Helvetica, sans-serif;  
		    color:#0f69a6;
		    font-size: 12px;
		    width: 225px;
		    height: 20px;
                    padding-left: 5px;
                    padding-top: 3px;
                    margin-bottom: 15px;
		}
                    div#box_enquete a.botao_enquete{
                        width: 76px;
                        height: 28px;
                        display: block;
                        background: #444444;
                        font-size: 18px;
                        color: #ffffff;
                        text-decoration: none;
                        padding-top: 5px;
                        padding-left: 26px;
                    }
                        div#box_enquete a.botao_enquete:hover{
                            text-decoration: underline;
                            background: #055286;
                            color: #ffffff;
                        }
                            div#box_enquete a{
                                color: #0f69a6;
                                font-weight: bold;
                            }
                                div#box_enquete a:hover{
                                    color: #000000;
                                }
    div#box_news{
        width: 280px;
        height: 330px;
        display: block;
        float: left;
        background: #f3f3f3;
        margin-top: 20px;
        margin-left: 10px;
    }
        div#box_news h3{
            width: 265px;
            height: 31px;
            display: block;
            background: #5fccf6;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 15px;
            padding-top: 6px;
         }
            div#box_news ul{
                display: block;
                padding-top: 15px;
                padding-left: 15px;
                width: 245px;
            }
                div#box_news ul li{
                    margin-top: 7px;
                }
                    div#box_news ul li.chamada{
                        color: #2e2e2e;
                    }
        .campo_news{
            border: 1px solid #5fccf6;
            background: #ffffff;
            font-family: Arial, Verdana, Helvetica, sans-serif;  
            color:#0f69a6;
            font-size: 12px;
            width: 225px;
            height: 20px;
            padding-left: 5px;
            padding-top: 3px;
            margin-top: 15px;
            margin-bottom: 15px;
        }
            div#box_news a.botao_news{
                width: 81px;
                height: 28px;
                display: block;
                background: #444444;
                font-size: 18px;
                color: #ffffff;
                text-decoration: none;
                padding-top: 5px;
                padding-left: 20px;
            }
                div#box_news a.botao_news:hover{
                    text-decoration: underline;
                    background: #055286;
                    color: #ffffff;
                }
                    div#box_news ul li.cancela{
                        color: #7d7d7d;
                    }
                        div#box_news ul li a{
                            color: #444444;
                        }
                            div#box_news ul li a:hover{
                                color: #000000;
                            }
    div#geral_boxs{
        width: 860px;
        display: block;
    }
    div#box_como_fazer{
        width: 280px;
        display: block;
        float: left;
        border-right: solid 1px #d5d5d5;
        margin-top: 20px;
    }
        div#box_como_fazer h4{
            display: block;
            font-size: 16px;
            font-weight: bold;
            color: #0f69a6;
            margin-bottom: 15px;
            margin-top: 20px;
        }
            div#box_como_fazer img.left_video{
                float: left;
                padding-right: 5px;
            }
                div#box_como_fazer a{
                    font-size: 18px;
                    color: #666666;
                }
                    div#box_como_fazer a:hover{
                        color: #000000;
                    }
    div#tarifas{
        width: 280px;
        display: block;
        float: left;
        border-right: solid 1px #d5d5d5;
        margin-top: 20px;
        margin-left: 10px;
        background: url(<?php echo $server_prefix_url;?>/images/bg_tarifas.jpg) no-repeat left top ;
    }
        div#tarifas h4{
            display: block;  
            font-size: 16px;
            color: #4b465a;
            padding-top: 20px;
            padding-left: 44px;
            margin-bottom: 20px;
        }
            div#tarifas p{
                width: 255px;
                display: block;
                padding-left: 5px;
                font-size: 14px;
            }
                a.link_saiba{
                    font-size: 16px;
                    font-weight: bold;
                    color: #2982a5;
                    margin-left: 5px;
                    padding-top: 5px;
                    display: block;
                    width: 110px;
                }
                    a.link_saiba:hover{
                        color: #000;
                    }
    div#utilize{
        width: 280px;
        display: block;
        float: left;
        margin-top: 20px;
        margin-left: 7px;
        background: url(<?php echo $server_prefix_url;?>/images/bg_utilize.jpg) no-repeat left top ;
    }
        div#utilize h4{
            display: block;  
            font-size: 16px;
            color: #4b465a;
            padding-top: 20px;
            padding-left: 63px;
            margin-bottom: 20px;
        }
            div#utilize p{
                width: 255px;
                display: block;
                padding-left: 5px;
                font-size: 14px;
            }
    div#nuvem_tags{
        width: 860px;
        display: block;
        margin-top: 30px;
        clear: both;
    }
        div#nuvem_tags h3{
            width: 843px;
            height: 31px;
            display: block;
            background: #c0d6df;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 15px;
            padding-top: 6px;
                    margin-bottom: 15px;
        }
            div#nuvem_tags a.pequena{
                font-size: 10px;
                color: #1376b8;
                margin-left: 5px;
            }
            div#nuvem_tags a.normal{
                font-size: 12px;
                color: #1376b8;
                margin-left: 5px;
            }
            div#nuvem_tags a.media{
                font-size: 18px;
                color: #1376b8;
                margin-left: 5px;
            }
            div#nuvem_tags a.grande{
                font-size: 25px;
                color: #1376b8;
                margin-left: 5px;
            }
            div#nuvem_tags a.master{
                font-size: 36px;
                color: #1376b8;
                margin-left: 5px;
            }
                div#nuvem_tags a.pequena:hover, div#nuvem_tags a.normal:hover, div#nuvem_tags a.media:hover,
                    div#nuvem_tags a.grande:hover, div#nuvem_tags a.master:hover {
                    color: #000000;
                }
    div#lista_indexacao{
        width: 860px;
        display: block;
        background: url(<?php echo $server_prefix_url;?>/images/bg_indexa.gif) repeat-x top #ecf6f8;
        margin-top: 25px;
    }
        div#aluguel{
            width: 840px;
            display: block;
            margin-top: 20px;
            padding-left: 20px;
            font-size: 10px;
            float: left;
            color: #575757;
        }
            div#aluguel strong{
                color: #2b2b2c;
                display:block;
            }
              div#aluguel a{
                font-size: 10px;
                color: #575757;
                text-decoration: none;
            }
            div#aluguel p{
                margin-top: 5px;
                margin-bottom: 15px;
                border-bottom: solid 1px #b4bbbd;
                padding-bottom:3px;
            }
             div#aluguel a:hover{
                color: #000000;
                text-decoration: underline;
            }
        div#locacao{
            width: 258px;
            display: block;
            margin-top: 20px;
            padding-left: 24px;
            border-right: solid 1px #b4bbbd;
            float: left;
        }
            div#locacao ul li strong{
                color: #2b2b2c;
                font-size: 12px;
            }
                div#locacao ul li.first{
                    margin-top: 0;
                }
                    div#locacao ul li{
                        margin-top: 5px;
                    }
                    div#locacao ul li a{
                            font-size: 10px;
                            color: #575757;
                            text-decoration: none;
                        }
                    div#locacao ul li a:hover{
                                color: #000000;
                                text-decoration: underline;
                            }
        div#parcerias{
            width: 168px;
            display: block;
            margin-top: 20px;
            padding-left: 24px;
            border-right: solid 1px #b4bbbd;
            float: left;
        }
            div#parcerias ul li strong{
                color: #2b2b2c;
                font-size: 12px;
            }
                div#parcerias ul li.first{
                    margin-top: 0;
                }
                    div#parcerias ul li{
                        margin-top: 5px;
                        color: #575757;
                        font-size: 10px;
                    }
                    div#parcerias ul li a{
                            font-size: 10px;
                            color: #575757;
                            text-decoration: none;
                        }
                    div#parcerias ul li a:hover{
                                color: #000000;
                                text-decoration: underline;
                            }
        div#layum{
            width: 144px;
            display: block;
            margin-top: 20px;
            padding-left: 30px;
            float: left;
        }
            div#layum ul li strong{
                color: #2b2b2c;
            }
                div#layum ul li.first{
                    margin-top: 0;
                }
                    div#layum ul li{
                        margin-top: 5px;
                    }
                        div#layum ul li a{
                            font-size: 10px;
                            color: #575757;
                            text-decoration: none;
                        }
                            div#layum ul li a:hover{
                                color: #000000;
                                text-decoration: underline;
                            }
                                div#layum ul li.second{
                                    margin-top: 19px;
                                }
/* ------------------------------------ FIM  HOME -------------------------------- */

/* -------------------------------- IN�CIO RODAP� -------------------------------- */
div#rodape{
    height: 93px;
    display: block;
    margin-top: 20px;
    background: #d6f2fd;
}
    div#rodape ul li{
        list-style: none;
    }
    div#container_rodape{
        width: 860px;
        display: block;
        margin: 0 auto;
    }
        div#info{
            width: 410px;
            display: block;
            float: left;
        }
            div#info p{
                font-size: 16px;
                font-weight: bold;
                color: #4b465a;
                display: block;
                margin-top: 20px;
                margin-bottom: 5px;
            }
                div#info span{
                    font-size: 10px;
                    color: #444444;
                }
                    div#info a{
                        font-size: 10px;
                        color: #444444;
                        text-decoration: none;
                        margin-left: 5px;
                    }
                         div#info a:hover{
                            color: #000000;
                            text-decoration: underline;
                         }
    div#interatividade{
        width: 430px;
        height: 93px;
        display: block;
        float: right;
        background: #a3def5;
    }
        div#interatividade h4{
            width: 363px;
            height: 23px;
            display: block;
            font-size: 16px;
            font-weight: bold;
            border-bottom: solid 1px #d0eefa;
            color: #ffffff;
            margin-left: 30px;
            margin-top: 10px;
        }
            div#interatividade ul{
                display: block;
                width: 363px;
                margin-top: 10px;
                margin-left: 30px;
            }
                div#interatividade ul li{
                    display: inline;
                    margin-left: 3px;
                }
                    div#interatividade ul li.first{
                        margin-left: 0;
                    }

.ac_results {
	padding: 0px;
	border: 1px solid black;
	background-color: white;
	overflow: hidden;
	z-index: 99999;
}

.ac_results ul {
	width: 100%;
	list-style-position: outside;
	list-style: none;
	padding: 0;
	margin: 0;
}

.ac_results li {
	margin: 0px;
	padding: 2px 5px;
	cursor: default;
	display: block;
	/* 
	if width will be 100% horizontal scrollbar will apear 
	when scroll mode will be used
	*/
	/*width: 100%;*/
	font: menu;
	font-size: 12px;
	/* 
	it is very important, if line-height not setted or setted 
	in relative units scroll will be broken in firefox
	*/
	line-height: 16px;
	overflow: hidden;
}

.ac_loading {
	background : url('<?php echo $server_prefix_url;?>/images/indicator.gif') right center no-repeat;
    background-color: white;
}
.ac_over {
	background-color: Highlight;
	color: HighlightText;
}

.ac_odd {
	background-color: #eee;
}

.ac_over {
	background-color: #0099FF;
	color: white;
}
.clearfloat {
	clear:both;
    height:0;
    font-size: 1px;
    line-height: 0px;
}

.dataRetirada, .dataDevolucao{
	border: 1px solid #5fccf6;
	background: #ffffff;
	font-family: Arial, Verdana, Helvetica, sans-serif;  
	color:#0f69a6;
	font-size: 12px;
	width: 113px;
	height: 20px;
	padding-left: 5px;
	padding-top: 3px;
}
div#conteudo_informacoes{
    width: 860px;
    display: block;
    margin-top: 20px;
    border: solid 1px #d0eefa;
}
div#informacoes_texto{
    width: 670px;
    padding: 5px 10px 5px 10px;
    display: block;
    background-color:#FFF;
    min-height:200px;
    float:left;
}
div#informacoes_publicidade{
    width: 150px;
    padding: 5px 10px 5px 10px;
    display: block;
    float:right;
    background-color:#FFF;
}
div#publicidade_1{
    width: 150px;
    display: block;
    border: solid 1px #d0eefa;
    background-color:#FFF;
    min-height:200px;
    text-align:center;
}
div#publicidade_2{
    width: 150px;
    display: block;
    margin-top: 5px;
    border: solid 1px #d0eefa;
    background-color:#FFF;
    min-height:300px;
    text-align:center;
}
div#publicidade_3{
    width: 150px;
    display: block;
    border: solid 1px #d0eefa;
    background-color:#FFF;
    min-height:200px;
    text-align:center;
}
/* ----------------- IN�CIO RESULTADO PESQUISA -------------------------------- */
div#container_pesquisa{
    width: 860px;
    display: block;
}
div#pesquisa_interna{
    width: 480px;
    height: 259px;
    display: block;
    float: left;
    background: #4b465a;
}
    div#pesquisa_interna h3{
	width: 465px;
	height: 31px;
	display: block;
	background: #ffc600;
	font-size: 20px;
	font-weight: bold;
	color: #ffffff;
	padding-left: 15px;
	padding-top: 6px;
    }
	div#pesquisa_interna table.geral_interna{
	    font-size: 12px;
	    color: #ffffff;
	    font-weight: bold;
            margin-left: 16px;
            margin-top: 13px;
	}
	    div#pesquisa_interna table span{
		color: #fbcf00;
		font-weight: bold;
	    }
    .campo_interna{
	border: 1px solid #5fccf6;
	background: #ffffff;
	font-family: Arial, Verdana, Helvetica, sans-serif;  
	color:#0f69a6;
	font-size: 12px;
	width: 202px;
	height: 25px;
	padding-left: 5px;
        padding-top: 3px;
    }
    .campo_data{
	border: 1px solid #5fccf6;
	background: #ffffff;
	font-family: Arial, Verdana, Helvetica, sans-serif;  
	color:#0f69a6;
	font-size: 12px;
	width: 85px;
	height: 20px;
	padding-left: 5px;
        padding-top: 3px;
    }
    .campo_hora{
	border: 1px solid #5fccf6;
	background: #ffffff;
	font-family: Arial, Verdana, Helvetica, sans-serif;  
	color:#0f69a6;
	font-size: 12px;
	width: 85px;
	height: 25px;
	padding-left: 5px;
        padding-top: 3px;
    }
div#atende_termos{
    width: 361px;
    height: 259px;
    display: block;
    float: right;
    
}
    div#horario{
        width: 361px;
        height: 100px;
        display: block;
        background: #c9e0e8;
        border: dashed 1px #8e8e8e;
        text-align:center;
    }
        div#horario h3{
            width: 346px;
            height: 31px;
            display: block;
            background: #8e8e8e;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 15px;
            padding-top: 6px;
        }
            div#horario p{
                width: 308px;
                display: block;
                margin-top: 5px;
                font-weight: bold;
                text-align: center;
                margin-left: 25px;
                margin-top: 9px;
                color: #282828;
            }
div#termos{
    width: 361px;
    height: 138px;
    display: block;
    margin-top: 16px;
    background: #f2f2f2;
}
    div#termos h3{
        width: 346px;
        height: 31px;
        display: block;
        background: #78ceef;
        font-size: 20px;
        font-weight: bold;
        color: #ffffff;
        padding-left: 15px;
        padding-top: 6px;
    }
        div#termos img{
            float: left;
            margin: 10px 5px 0 10px;
        }
            div#termos p{
                font-size: 14px;
                color: #c89b00;
                display: block;
                margin-top: 10px;
            }
                div#termos a{
                    width: 81px;
                    height: 22px;
                    display: block;
                    background: #c89b00;
                    font-size: 12px;
                    color: #ffffff;
                    text-decoration: none;
                    padding-top: 5px;
                    padding-left: 17px;
                    float: left;
                    margin-top: 5px;
                }
                    div#termos a:hover{
                        background: #444444;
                        text-decoration: underline;
                    }
div#container_detalhes{
    width: 860px;
    display: block;
    margin-top: 20px;
}
    div#detalhes_pesquisa{
        width: 609px;
        display: block;
        float: left;
    }
        div#abas_pesquisa{
            width: 609px;
            height: 39px;
            display: block;
            background: url(<?php echo $server_prefix_url;?>/images/bg_abas_comparacao_2.jpg) no-repeat;
            margin-top: 10px;
        }
        div#abas_pesquisa2{
            width: 609px;
            height: 39px;
            display: block;
            background: url(<?php echo $server_prefix_url;?>/images/bg_abas_comparacao_3.jpg) no-repeat;
            margin-top: 10px;
        }
        div#abas_pesquisa span{
                font-size: 16px;
                color: #4b465a;
                font-weight: bold;
                display: block;
                width: 90px;
                float: left;
                padding-left: 55px;
                margin-top: 7px;
            }
            div#abas_pesquisa2 span{
                font-size: 16px;
                color: #4b465a;
                font-weight: bold;
                display: block;
                width: 115px;
                float: left;
                padding-left: 48px;
                margin-top: 7px;
            }
                div#abas_pesquisa2 a{
                    font-size: 16px;
                    color: #ffffff;
                    text-decoration: none;
                    font-weight: bold;
                    display: block;
                    width: 90px;
                    float: left;
                    padding-left: 63px;
                    margin-top: 7px;
                }
                div#abas_pesquisa a{
                    font-size: 16px;
                    color: #ffffff;
                    text-decoration: none;
                    font-weight: bold;
                    display: block;
                    width: 115px;
                    float: left;
                    padding-left: 48px;
                    margin-top: 7px;
                }
                    div#abas_pesquisa a:hover{
                        text-decoration: underline;
                    }
                    div#abas_pesquisa2 a:hover{
                        text-decoration: underline;
                    }
    
    div#geral_detalhes{
        width: 850px;
        display: block;
        background: #f6f6f6;
        border-left: solid 1px #dfdfdf;
        border-right: solid 1px #dfdfdf;
        border-bottom: solid 1px #dfdfdf;
        margin-left: 1px;
    }
div#master_detalhes{
    width: 835px;
    display: block;
    margin-left: 10px;
    padding-top: 1px;
    background: #ffffff;
}
        div#lateral_direita{
            width: 229px;
            display: block;
            float: right;
        }
            div#lateral_direita a{
                font-size: 12px;
                color: #4b465a;
                display: block;
                float: right;
            }
                div#lateral_direita a:hover{
                    color: #ffc600;
                }
                    div#lateral_direita img{
                        margin-top: 10px;
                    }








/* -------------------- FIM RESULTADO PESQUISA -------------------------------- */

.CollapsiblePanel {
	margin: 0px;
	padding: 0px;
}


.CollapsiblePanelTab {
	margin: 0px;
	cursor: pointer;
	-moz-user-select: none;
	-khtml-user-select: none;
}

.CollapsiblePanelContent {
	margin: 0px;
	padding: 0px;
}

.CollapsiblePanelTab a {
	color: black;
	text-decoration: none;
}
/* ------------------- IN�CIO ESCOLHA LOCADORA -------------------------------- */
div#geral_escolha{
    width: 860px;
    display: block;
    margin-top: 20px;
    
}
    div#barra_processo{
        width: 860px;
        height: 55px;
        display: block;
        padding-top: 5px;
    }
    div#barra_processo h3{
    	font-size:20px;
        text-align:center;
        margin-top: 10px;
        color:#F00;
    }
        div#ativo_escolha{
            border-bottom: solid 2px #1f78b4;
            display: block;
            float: left;
            height: 52px;
            width: 187px;
        }
                div#ativo_escolha strong{
                    display: block;
                    float: left;
                    font-size: 34px;
                    color: #39529c;
                    font-weight: bold;
                    padding-right: 5px;
                    margin-top: 7px;
                }
                    div#ativo_escolha p{
                        font-size: 14px;
                        font-weight: bold;
                        color: #39529c;
                        display: block;
                        margin-top: 13px;
                    }
                        div#ativo_escolha p span{
                            font-size: 11px;
                            color: #39529c;
                            font-weight: normal;
                            display: block;
                        }
        div#seguros{
            display: block;
            float: left;
            height: 50px;
            width: 242px;
            margin-left: 25px;
        }
                div#seguros strong{
                    display: block;
                    float: left;
                    font-size: 34px;
                    color: #a4b2de;
                    font-weight: bold;
                    padding-right: 5px;
                    margin-top: 7px;
                }
                    div#seguros p{
                        font-size: 14px;
                        font-weight: bold;
                        color: #a4b2de;
                        display: block;
                        margin-top: 13px;
                    }
                        div#seguros p span{
                            font-size: 11px;
                            color: #a4b2de;
                            font-weight: normal;
                            display: block;
                        }
        div#identificacao{
            display: block;
            float: left;
            height: 50px;
            width: 175px;
            margin-left: 25px;
        }
                div#identificacao strong{
                    display: block;
                    float: left;
                    font-size: 34px;
                    color: #a4b2de;
                    font-weight: bold;
                    padding-right: 5px;
                    margin-top: 7px;
                }
                    div#identificacao p{
                        font-size: 14px;
                        font-weight: bold;
                        color: #a4b2de;
                        display: block;
                        margin-top: 13px;
                    }
                        div#identificacao p span{
                            font-size: 11px;
                            color: #a4b2de;
                            font-weight: normal;
                            display: block;
                        }
div#ativo_identificacao{
	border-bottom: solid 2px #1f78b4;
            display: block;
            float: left;
            height: 50px;
            width: 175px;
            margin-left: 25px;
        }
                div#ativo_identificacao strong{
                    display: block;
                    float: left;
                    font-size: 34px;
                    color: #39529c;
                    font-weight: bold;
                    padding-right: 5px;
                    margin-top: 7px;
                }
                    div#ativo_identificacao p{
                        font-size: 14px;
                        font-weight: bold;
                        color: #39529c;
                        display: block;
                        margin-top: 13px;
                    }
                        div#ativo_identificacao p span{
                            font-size: 11px;
                            color: #39529c;
                            font-weight: normal;
                            display: block;
                        }                 
                        
        div#finalizacao{
            display: block;
            float: left;
            height: 50px;
            width: 175px;
            margin-left: 25px;
        }
                div#finalizacao strong{
                    display: block;
                    float: left;
                    font-size: 34px;
                    color: #a4b2de;
                    font-weight: bold;
                    padding-right: 5px;
                    margin-top: 7px;
                }
                    div#finalizacao p{
                        font-size: 14px;
                        font-weight: bold;
                        color: #a4b2de;
                        display: block;
                        margin-top: 13px;
                    }
                        div#finalizacao p span{
                            font-size: 11px;
                            color: #a4b2de;
                            font-weight: normal;
                            display: block;
                        }
div#ativo_finalizacao{
	border-bottom: solid 2px #1f78b4;
            display: block;
            float: left;
            height: 50px;
            width: 175px;
            margin-left: 25px;
        }
                div#ativo_finalizacao strong{
                    display: block;
                    float: left;
                    font-size: 34px;
                    color: #39529c;
                    font-weight: bold;
                    padding-right: 5px;
                    margin-top: 7px;
                }
                    div#ativo_finalizacao p{
                        font-size: 14px;
                        font-weight: bold;
                        color: #39529c;
                        display: block;
                        margin-top: 13px;
                    }
                        div#ativo_finalizacao p span{
                            font-size: 11px;
                            color: #39529c;
                            font-weight: normal;
                            display: block;
                        }                             
    div#escolha_logo{
        width: 860px;
        height: 40px;
        display: block;
        margin-top: 15px;
    }
        div#escolha_logo strong{
            font-size: 16px;
        }
            div#escolha_logo img{
                vertical-align: middle;
                margin-left: 10px;
            }
    div#info_reserva{
        width: 860px;
        display: block;
        margin-top: 15px;
    }
    div#info_cadastro_locadora{
        margin: 15px 0px 15px 0px;
        display:block;
    }
        div#tabela_info{
            width: 357px;
            display: block;
            float: left;
            margin-top: 10px;
        }
        div#info_reserva h3{
            width: 841px;
            height: 25px;
            display: block;
            background: #45aaee;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 20px;
            padding-top: 5px;
        }
        div#topo_locadora h1{
            width: 841px;
            height: 25px;
            display: block;
            background: #45aaee;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 20px;
            padding-top: 5px;
        }
            div#info_reserva ul li{
                display: block;
                width: 335px;
                min-height: 20px;
                background: #e7eff4;
                border-bottom: solid 1px #c2d6e3;
                border-top: solid 1px #c2d6e3;
                margin-top: 4px;
                padding-left: 18px;
                padding-top: 6px;
            }
            
    div#veiculos_disponiveis{
        width: 478px;
        float: right;
        display: block;
        margin-top: 10px;
    }
        div#veiculos_disponiveis h4{
            width: 478px;
            height: 25px;
            display: block;
            font-size: 12px;
            font-weight: bold;
            color: #0d4c76;
            border-bottom: solid 1px #a4d5f7;
            margin-bottom: 10px;
        }
        div#veiculos_disponiveis h5{
            width: 478px;
            height: 15px;
            display: block;
            font-size: 16px;
            font-weight: bold;
            color: #0d4c76;
            border-bottom: solid 1px #a4d5f7;
            margin-bottom: 10px;
        }
        div#title_veicleft{
            width: 178px;
            height: 25px;
            display: block;
            font-size: 16px;
            font-weight: bold;
            color: #0d4c76;
            float: left;
        }
        div#title_veicright{
            width: 198px;
            height: 25px;
            display: block;
            font-size: 16px;
            font-weight: bold;
            color: #0d4c76;
            float: right;
            text-align:right;
        }
            div#veiculos_disponiveis table img.carros_locadora{
                margin-bottom: 10px;
            }
                div#veiculos_disponiveis table{
                    color: #0f69a6;
                    font-weight: bold;
                }
    div#container_retirada_devolucao{
        width: 860px;
        display: block;
        margin-top: 20px;
    }
        div#container_retirada_devolucao h3{
            width: 841px;
            height: 25px;
            display: block;
            background: #2a88c8;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 20px;
            padding-top: 5px;
        }
            div#retirada{
                width: 835px;
                display: block;
                padding-left: 20px;
                margin-top: 10px;
            }
                div#retirada strong{
                    color: #1c679a;
                    display: block;
                    margin-bottom: 10px;
                }
                    div#retirada  ul li{
                        margin-top: 10px;
                        font-weight: bold;
                    }
    div#container_retirada_devolucao h3.devolucao{
        width: 841px;
        height: 25px;
        display: block;
        background: #196599;
        font-size: 16px;
        font-weight: bold;
        color: #ffffff;
        padding-left: 20px;
        padding-top: 5px;
        margin-top: 20px;
    }
        div#devolucao{
            width: 835px;
            display: block;
            padding-left: 20px;
            margin-top: 10px;
        }
            div#devolucao strong{
                color: #1c679a;
                display: block;
                margin-bottom: 10px;
            }
            div#devolucao  ul{
                display: block;
                float: left;
            }
                div#devolucao  ul li{
                    margin-top: 10px;
                    font-weight: bold;
                }
    div#importante_escolha{
        width: 256px;
        height: 136px;
        display: block;
        float: right;
        margin-top:30px;

    }
        div#importante_escolha p{
            font-size: 14px;
            color: #ffffff;
            display: block;
            width: 250px;
            height: 115px;
            background: #4b465a;
            padding-left: 10px;
            padding-top: 10px;
            text-align: center;
        }
            div#importante_escolha p strong{
                font-size: 21px;
                font-weight: bold;
                display: block;
                color:#ffffff;
            }



/* ---------------------- FIM ESCOLHA LOCADORA -------------------------------- */
#aviso_mais_30dias{
	font-size: 16px;
	font-weight: bold;
	display: block;
    text-align:center;
	}
.reserva_left{
	display: block;
    margin-top: 20px;
    display: block;
}


/* ---------------------- IN�CIO ESCOLHA SEGURO ------------------------------- */
div#lojas_seguro{
    width: 860px;
    display: block;
    margin-top: 10px;
}
    div#loja_retirada{
	width: 407px;
	display: block;
	float: left;
    }
	div#loja_retirada ul li.first{
	    display: block;
	    width: 389px;
	    height: 20px;
	    color: #044977;
	    background: #b5ddf8;
	    border-bottom: solid 1px #c2d6e3;
	    border-top: solid 1px #c2d6e3;
	    margin-top: 4px;
	    padding-left: 18px;
	    padding-top: 6px;
	    margin-left: 0;
	}
	    div#loja_retirada ul li.horas{
		margin-top: 10px;
		color: #1c679a;
		font-weight: bold;
	    }
		div#loja_retirada ul li{
		    margin-top: 5px;
		    margin-left: 18px;
		}
    div#loja_devolucao{
	width: 407px;
	display: block;
	float: right;
    }
	div#loja_devolucao ul li.first{
	    display: block;
	    width: 389px;
	    min-height: 20px;
	    color: #044977;
	    background: #b5ddf8;
	    border-bottom: solid 1px #c2d6e3;
	    border-top: solid 1px #c2d6e3;
	    margin-top: 4px;
	    padding-left: 18px;
	    padding-top: 6px;
	    margin-left: 0;
	}
	    div#loja_devolucao ul li.horas{
		margin-top: 10px;
		color: #1c679a;
		font-weight: bold;
	    }
		div#loja_devolucao ul li{
		    margin-top: 5px;
		    margin-left: 18px;
		}
    div#aviso_importante{
	width: 381px;
	height: 90px;
	display: block;
	float: right;
	background: #4b465a;
	text-align: center;
	margin-top: 10px;
	padding-right: 8px;
    }
	div#aviso_importante strong{
	    font-size: 16px;
	    color: #ffffff;
	    display: block;
	    margin-bottom: 5px;
	}
	    div#aviso_importante p{
		margin-top: 13px;
		display: block;
		color: #ffffff;
	    }
    div#protecao_inclusa{
	width: 860px;
	display: block;
	margin-top: 20px;
    }
	div#protecao_inclusa h3{
            width: 841px;
            height: 25px;
            display: block;
            background: #45aaee;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 20px;
            padding-top: 5px;
        }
	    div#protecao_inclusa strong{
		display: block;
		margin-left: 20px;
		color: #8c8c8c;
		font-size: 14px;
		margin-top: 10px;
	    }
		div#protecao_inclusa p{
		    display: block;
		    padding-left: 20px;
		    margin-top: 10px;
		    color: #8c8c8c;
		    line-height: 20px;
		}
		    div#protecao_inclusa p span{
			display: block;
			font-weight: bold;
		    }
    div#add_protecao{
	width: 860px;
	display: block;
	margin-top: 20px;
    }
	div#add_protecao h3{
            width: 841px;
            height: 25px;
            display: block;
            background: #196599;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 20px;
            padding-top: 5px;
        }
	    div#add_protecao p{
		display: block;
		line-height: 20px;
		width: 800px;
		float: left;
		margin-top: 15px;
	    }
		.bt_add{
		    float: left;
		    width: 22px;
		    padding-right: 10px;
		    margin-top: 15px;
		    padding-left: 20px;
		}
    div#produtos_adicionais{
	width: 860px;
	display: block;
	margin-top: 20px;
    }
	div#produtos_adicionais h3{
            width: 841px;
            height: 25px;
            display: block;
            background: #196599;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 20px;
            padding-top: 5px;
        }
	    div#produtos_adicionais ul{
		display: block;
		margin-top: 15px;
		padding-left: 20px;
	    }
		div#produtos_adicionais ul li{
		    font-weight: bold;
		    margin-top: 10px;
		}
		    div#produtos_adicionais ul li span{
			color: #ff7f00;
			margin-left: 10px;
		    }
			div#produtos_adicionais ul li img{
			    vertical-align: middle;
			    padding-right: 10px;
			}
    div#valor_locacao{
	width: 860px;
	display: block;
	margin-top: 20px;
    }
	div#valor_locacao h3{
            width: 841px;
            height: 25px;
            display: block;
            background: #054c7d;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            padding-left: 20px;
            padding-top: 5px;
        }
	    div#valor_locacao ul{
		display: block;
		margin-top: 15px;
		padding-left: 20px;
	    }
		div#valor_locacao ul li{
		    font-weight: bold;
		    margin-top: 10px;
		    color: #054c7d;
		}
    div#container_botao{
	width: 860px;
	display: block;
	margin-top: 50px;
    }
	div#container_botao img.bt_cont{
	    float: left;
	}
	    div#indique_pagina{
		width: 375px;
		height: 76px;
		display: block;
		float: right;
		background: url(<?php echo $server_prefix_url;?>/images/icon_indique.jpg) left no-repeat #c4c4c4;
        margin-top: 40px;
	    }
		div#indique_pagina a{
		    font-size: 14px;
		    color: #054c7d;
		    font-weight: bold;
		    display: block;
		    width: 272px;
		    margin-top: 20px;
		    margin-left: 92px;
		}
		    div#indique_pagina a:hover{
			color: #000000;
		    }
    div#ativo_seguros{
            border-bottom: solid 2px #1f78b4;
            display: block;
            float: left;
            height: 52px;
            width: 242px;
	    margin-left: 25px;
        }
                div#ativo_seguros strong{
                    display: block;
                    float: left;
                    font-size: 34px;
                    color: #39529c;
                    font-weight: bold;
                    padding-right: 5px;
                    margin-top: 7px;
                }
                    div#ativo_seguros p{
                        font-size: 14px;
                        font-weight: bold;
                        color: #39529c;
                        display: block;
                        margin-top: 13px;
                    }
                        div#ativo_seguros p span{
                            font-size: 11px;
                            color: #39529c;
                            font-weight: normal;
                            display: block;
                        }
    div#escolha{
            display: block;
            float: left;
            height: 52px;
            width: 187px;
        }
                div#escolha strong{
                    display: block;
                    float: left;
                    font-size: 34px;
                    color: #A4B2DE;
                    font-weight: bold;
                    padding-right: 5px;
                    margin-top: 7px;
                }
                    div#escolha p{
                        font-size: 14px;
                        font-weight: bold;
                        color: #A4B2DE;
                        display: block;
                        margin-top: 13px;
                    }
                        div#escolha p span{
                            font-size: 11px;
                            color: #A4B2DE;
                            font-weight: normal;
                            display: block;
                        }
/* ------------------------- FIM ESCOLHA SEGURO ------------------------------- */
/* -------------------- IN�CIO RESULTADO COMPARA��O --------------------------- */
div#container_comparacao{
    width: 860px;
    display: block;
    margin-top: 20px;
}
    div#detalhes_pesquisa_comparacao{
        width: 609px;
        display: block;
        float: left;
    }
        div#abas_pesquisa_comparacao{
            width: 609px;
            height: 39px;
            display: block;
            background: url(<?php echo $server_prefix_url;?>/images/bg_abas_comparacao.jpg) no-repeat;
        }
            div#abas_pesquisa_comparacao span{
                font-size: 16px;
                color: #4b465a;
                font-weight: bold;
                display: block;
                width: 90px;
                float: left;
                padding-left: 56px;
                margin-top: 7px;
            }
                div#abas_pesquisa_comparacao a{
                    font-size: 16px;
                    color: #ffffff;
                    text-decoration: none;
                    font-weight: bold;
                    display: block;
                    width: 115px;
                    float: left;
                    padding-left: 72px;
                    margin-top: 7px;
                }
                    div#abas_pesquisa_comparacao a:hover, div#abas_pesquisa_comparacao a.locadora:hover{
                        text-decoration: underline;
                    }
                        div#abas_pesquisa_comparacao a.locadora{
                            font-size: 16px;
                            color: #ffffff;
                            text-decoration: none;
                            font-weight: bold;
                            display: block;
                            width: 115px;
                            float: left;
                            padding-left: 21px;
                            margin-top: 7px;
                        }
     div#geral_detalhes_comparacao{
        width: 605px;
        display: block;
        background: #f6f6f6;
        border-left: solid 1px #dfdfdf;
        border-right: solid 1px #dfdfdf;
        border-bottom: solid 1px #dfdfdf;
        margin-left: 1px;
    }
        div#container_blocos{
            width: 590px;
            display: block;
            background: #ffffff;
            margin: 0 0 10px 8px;
        }
            .paginacao_comparacao{
                width: 590px;
                height: 60px;
                display: block;
                padding-top: 15px;
                clear: both;
            }
                .paginacao_comparacao ul{
                    display: block;
                    float: right;
                    width: 300px;
                    padding-right: 20px;
                    margin-top: 0px;
                }
                    .paginacao_comparacao ul li{
                        display: inline;
                        float: left;
                        margin-left: 10px;
                        color: #898989;
                    }
                        .paginacao_comparacao a.mais_comparacao{
                            float: right;
                            padding-right: 25px;
                        }
                            .paginacao_comparacao ul li a{
                                color: #898989;
                            }
                                .paginacao_comparacao ul li a:hover{
                                    color: #000000;
                                }
    .topo_locadoras{
        width: 550px;
        display: block;
        float: right;
        margin-right: 20px;
    }
    .topo_locadoras2{
        float:left;
        display: block;
        margin-right: 20px;
    }
        .numeracao_comparacao{
            width: 443px;
            height: 16px;
            background: #b5e3f5;
            display: block;
            float: right;
        }
            .numeracao_comparacao ul li{
                display: inline;
                width: 109px;
                border-right: dashed 1px #fff;
                text-align: center;
                color: #4b465a;
                font-weight: bold;
                float: left;
            }
                 .numeracao_comparacao ul li.last{
                    border-right: 0;
                 }
        .numeracao_comparacao2{
        	width: 1200px;
            height: 16px;
            background: #b5e3f5;
            display: block;
            float: left;
        }
            .numeracao_comparacao2 ul li{
                display: inline;
                width: 109px;
                border-right: dashed 1px #fff;
                text-align: center;
                color: #4b465a;
                font-weight: bold;
                float: left;
            }
                 .numeracao_comparacao2 ul li.last{
                    border-right: 0;
                 }
    .marca_cima{
        width: 550px;
        height: 57px;
        display: block;
        clear: both;
    }
        .marca_cima ul li{
            display: inline;
            float: left;
            width: 108px;
            height: 57px;
            text-align: center;
            border-right: dashed 1px #d7d7d7;
        }
            .marca_cima ul li.last{
                border-right: none;
            }
                .marca_cima ul li img{
                    margin-top: 15px;
                }
    .marca_cima2{
        height: 57px;
        display: block;
        clear: both;
    }
        .marca_cima2 ul li{
            display: inline;
            float: left;
            width: 108px;
            height: 57px;
            text-align: center;
            border-right: dashed 1px #d7d7d7;
        }
            .marca_cima2 ul li.last{
                border-right: none;
            }
                .marca_cima2 ul li img{
                    margin-top: 15px;
                }
    .marca_cima_cat{
        width: 550px;
        height: 77px;
        display: block;
        clear: both;
    }
        .marca_cima_cat ul li{
            display: inline;
            float: left;
            width: 108px;
            height: 57px;
            text-align: center;
            border-right: dashed 1px #d7d7d7;
        }
       .marca_cima_cat ul li.last{
                border-right: none;
            }
                .marca_cima_cat ul li img{
                    margin-top: 0px;
                }
       .marca_cima_cat2{
        width: 550px;
        height: 77px;
        display: block;
        clear: both;
    }
        .marca_cima_cat2 ul li{
        	margin-top:20px;
            display: inline;
            float: left;
            width: 108px;
            height: 57px;
            text-align: center;
            border-right: dashed 1px #d7d7d7;
        }
       .marca_cima_cat2 ul li.last{
                border-right: none;
            }
                .marca_cima_cat2 ul li img{
                    margin-top: 0px;
                }
    .container_precos{
        width: 550px;
        height: 91px;
        display: block;
        float: right;
        margin-right: 20px;
        background: url(<?php echo $server_prefix_url;?>/images/bg_comp.jpg) repeat-x;
        border: solid 1px #eeeeee;
    }
    .container_precos2{
        height: 102px;
        width: 1200px;
        display: block;
        float: left;
        margin-right: 20px;
        background: url(<?php echo $server_prefix_url;?>/images/bg_comp.jpg) bottom left repeat-x;
        border: solid 1px #eeeeee;
    }
        .categorias_precos{
            width: 109px;
            height: 102px;
            display: block;
            float: left;
            background: #b5e3f5;
            text-align: center;
        }
            .categorias_precos strong{
                display: block;
                color: #4b465a;
                margin-top: 5px;
                margin-bottom: 5px;
            }
            .categorias_precos a{
                display: block;
                font-size:10px;
            }
        .categorias_precos_cat{
            width: 109px;
            height: 91px;
            display: block;
            float: left;
            text-align: center;
            background:#fff;
        }
            .categorias_precos_cat strong{
                display: block;
                color: #4b465a;
                margin-top: 15px;
                margin-bottom: 5px;
            }
            .categorias_precos_cat img{
                margin-top: 10px;
            }
    .preco_compativo{
        width: 109px;
        height: 102px;
        display: block;
        float: left;
        text-align: center;
        border-right: solid 1px #d7d7d7;
    }
        .preco_compativo ul{
            display: block;
            width: 90px;
            height: 66px;
            margin: 0 auto;
            margin-top: 7px;
            padding: 5px;
        }
            .preco_compativo ul li.precos{
                font-size: 14px;
                font-weight: bold;
            }
                .preco_compativo ul li.precos span{
                    font-size: 12px;
                }
                    .preco_compativo ul li.total_comp{
                        font-size: 11px;
                        color: #6e6e6e;
                    }
                        .preco_compativo ul li a{
                            font-size: 11px;
                            color: #b10000;
                            font-weight: bold;
                        }
                            .preco_compativo ul li a:hover{
                                color: #4b465a;
                            }
                                .preco_compativo ul li.nao_dispo{
                                    font-size: 11px;
                                    color: #6e6e6e;
                                    margin-top: 27px;
                                }
                                .preco_compativo span{
                                    font-size: 11px;
                                    color: #6e6e6e;
                                    margin-top: 27px;
                                    font-weight: bold;
                                }
    .last_precos{
        border-right: 0;
    }
        .menor_preco{
            background: #fbe88d;
        }
            
/* -------------------- FIM RESULTADO COMPARA��O --------------------------- */

div#escolha_login{
        width: 860px;
        min-height: 40px;
        display: block;
        margin-top: 15px;
        margin-bottom: 15px;
    }
        div#escolha_login strong{
            font-size: 16px;
        }
.botao_login{
                width: 81px;
                height: 28px;
                display: block;
                background: #444444;
                font-size: 18px;
                color: #ffffff;
                text-decoration: none;
                padding-top: 5px;
                padding-left: 20px;
            }
.botao_login:hover{
                    text-decoration: underline;
                    background: #055286;
                    color: #ffffff;
                }
.botao_login_cadastro{
                width: 115px;
                height: 28px;
                display: block;
                background: #444444;
                font-size: 18px;
                color: #ffffff;
                text-decoration: none;
                padding-top: 5px;
                padding-left: 20px;
            }
.botao_login_cadastro:hover{
                    text-decoration: underline;
                    background: #055286;
                    color: #ffffff;
                }
                
.campo_std{
	border: 1px solid #5fccf6;
	background: #ffffff;
	font-family: Arial, Verdana, Helvetica, sans-serif;  
	color:#0f69a6;
	font-size: 12px;
	height: 20px;
	padding-left: 5px;
        padding-top: 3px;
    }
.campo_txt_area{
	border: 1px solid #5fccf6;
	background: #ffffff;
	font-family: Arial, Verdana, Helvetica, sans-serif;
    color:#0f69a6;
	font-size: 12px;
	padding-left: 5px;
    padding-top: 3px;
    }
    
.cadastro_cliente_left{
	width:420px;
    float: left;
    margin-right: 15px;
    margin-bottom: 15px;
}
.cadastro_cliente_right{
	width:420px;
    float: right;
    margin-bottom: 15px;
}
fieldset {
	border: dotted 1px #1f78b4;
    padding: 10px;
    font-weight: bold;
}
legend {
	font-weight: bold;
    color: #39529c;
    font-size:14px;
    background-color:#FFF;
}
.campo_estadoCidade{
	border: 1px solid #5fccf6;
	background: #ffffff;
	font-family: Arial, Verdana, Helvetica, sans-serif;  
	color:#0f69a6;
	font-size: 12px;
	height: 25px;
	padding-left: 5px;
    padding-top: 3px;
}

/* -------------------Pagina de Contato - Telefones -------------------*/
#conteudo_contato{
    width: 860px;
    display: block;
    margin-top: 0;
}
#banner_voip{
    width: 358px;
    display: block;
    background-color:#FFF;
    min-height:200px;
    float:right;
    margin: 10px 0px 0px 0px;
}
#contato_left{
    width: 495px;
    display: block;
    float:left;
}
#contato_left_1{
    width: 460px;
    display: block;
    min-height:194px;
    background-image:url(<?php echo $server_prefix_url;?>/contato/fundo_2.jpg);
    margin-left: 20px;
    background-repeat:no-repeat;
    background-position:top;
    color:#666666;
    font-weight:bold;
    font-family:Verdana, Geneva, sans-serif;
}
#contato_left_2{
    width: 460px;
    display: block;
    min-height:120px;
    margin-left: 20px;
    padding-top: 5px;
}
#contato_left_2 h2{
    font-family:Arial, Helvetica, sans-serif;
    font-size:14px;
    color:#666666;
    margin-left: 10px;
    margin-top: 10px;
}
#contato_left_2 p{
    color:#666666;
    font-weight:bold;
    font-family:Arial, Helvetica, sans-serif;
    margin-left: 10px;
    margin-top: 10px;
}
#contato_left_2 a{
    color:#FF7900;
}
#contato_left_1 h2{
    font-family:Arial, Helvetica, sans-serif;
    font-size:14px;
    color:#FFF;
    margin-left: 10px;
    padding-top: 22px;
}
#contato_left_1 p{
    margin-left: 10px;
    margin-top: 10px;
}
#cidade_combo{
	margin-left: 10px;
    margin-top: 10px;
}
#lista_telefones{
	margin-left: 10px;
    margin-top: 10px;
}
#mapa_de_locadoras{
	margin-top: 10px;
}
#title_mapas{
    width: 860px;
    display: block;
    margin-top: 15px;
}
#title_mapas h1{
    width: 841px;
    height: 25px;
    display: block;
    background: #45aaee;
    font-size: 18px;
    font-weight: bold;
    color: #ffffff;
    padding-left: 20px;
    padding-top: 5px;
}
#mapa_legenda{
    width: 200px;
    display: block;
    float: right;
    background: #FFF;
    margin-left: 5px;
}
#mapa_legenda h3{
    width: 185px;
    height: 28px;
    display: block;
    background: #5fccf6;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    padding-left: 15px;
    padding-top: 6px;
}
#mapa_legenda p{
    width: 180px;
    font-size: 10px;
    margin: 5px 0px 5px 5px;
}
#mapFrame1{
    height: 450px;
    width:650px;
    float:left;
    overflow:hidden;
}
.toggleLabel{
	display:block;
	height:40px;
    width:80px;
    float:left;
    margin: 3px 0px 3px 15px;
}
div#cliente_dados{
	width: 860px;
	display: block;
	margin-top: 20px;
    overflow:hidden;
}
div#cliente_dados h3{
    width: 841px;
    height: 25px;
    display: block;
    background: #054c7d;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    padding-left: 20px;
    padding-top: 5px;
}
div#cliente_dados p{
    width: 841px;
    display: block;
    font-size: 14px;
    color: #000;
    padding-left: 20px;
    padding-top: 5px;
    margin-bottom: 10px;
}
div#cliente_dados ul{
    display: block;
    margin-top: 15px;
    padding-left: 20px;
    margin-bottom:15px;
}
div#cliente_dados ul li{
    font-weight: bold;
    margin-top: 10px;
    color: #054c7d;
}
div#dados_cliente{
    width: 860px;
    display: block;
    margin-top: 10px;
}
div#dados_cli_1{
	width: 407px;
	display: block;
	float: left;
}
div#dados_cli_1 ul li{
    margin-top: 5px;
    margin-left: 18px;
}
div#dados_cli_2{
	width: 407px;
	display: block;
	float: right;
}
div#dados_cli_3{
	width: 350px;
	display: block;
	float: left;
    margin-left: 20px;
}
div#dados_cli_4{
	width: 480px;
	display: block;
	float: right;
}
div#dados_cli_2 ul li{
    margin-top: 5px;
    margin-left: 18px;
}
div#info_importante{
    width: 860px;
    display: block;
    margin-top: 15px;
}
div#info_importante h3{
    width: 841px;
    height: 25px;
    display: block;
    background: #45aaee;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    padding-left: 20px;
    padding-top: 5px;
}
div#info_importante ol li{
    background: #e7eff4;
    border-bottom: solid 1px #c2d6e3;
    border-top: solid 1px #c2d6e3;
    margin-top: 4px;
    margin-left: 40px;
    padding-left: 18px;
    padding-top: 6px;
    padding-bottom: 5px;
}

div#confirma_loca{
	width: 860px;
	display: block;
	margin-top: 20px;
    overflow:hidden;
}
div#confirma_loca h3{
    width: 841px;
    height: 25px;
    display: block;
    background: #054c7d;
    font-size: 16px;
    font-weight: bold;
    color: #FFF;
    padding-left: 20px;
    padding-top: 5px;
}
div#confirma_loca p{
    width: 841px;
    display: block;
    font-size: 14px;
    color: #000;
    padding-left: 20px;
    padding-top: 5px;
    margin-bottom: 10px;
}
div#confirma_loca ul{
    display: block;
    margin-top: 15px;
    padding-left: 20px;
    margin-bottom:15px;
}
div#confirma_loca ul li{
    font-weight: bold;
    margin-top: 10px;
    color: #054c7d;
}

div#confirma_aval{
	width: 860px;
	display: block;
	margin-top: 20px;
    overflow:hidden;
}
div#confirma_aval h3{
    width: 841px;
    height: 25px;
    display: block;
    background: #45aaee;
    font-size: 16px;
    font-weight: bold;
    color: #FFF;
    padding-left: 20px;
    padding-top: 5px;
}
div#confirma_aval p{
    width: 841px;
    display: block;
    font-size: 14px;
    color: #054c7d;
    padding-left: 20px;
    padding-top: 5px;
    font-weight:bold;
    margin-top:10px;
}
div#confirma_aval ul{
    display: block;
    margin-top: 10px;
    width: 200px;
    padding-left: 20px;
    margin-bottom:15px;
    float:left;
}
div#confirma_aval .ul2{
    display: block;
    margin-top: 10px;
    width: 400px;
    padding-left: 20px;
    margin-bottom:15px;
    float:left;
}
div#confirma_aval ul li{
    font-weight: bold;
    margin-top: 10px;
    color: #054c7d;
}
div#solicitacao_copia{
		width: 365px;
		height: 76px;
		display: block;
		float: right;
		background: url(<?php echo $server_prefix_url;?>/images/icon_indique.jpg) left no-repeat #c4c4c4;
        margin-top: 15px;
        margin-left:10px;
	    }
		div#solicitacao_copia a{
		    font-size: 14px;
		    color: #054c7d;
		    font-weight: bold;
		    display: block;
		    width: 272px;
		    margin-top: 10px;
		    margin-left: 92px;
		}
		    div#solicitacao_copia a:hover{
			color: #000000;
		    }
div#solicitacao_copia2{
		width: 585px;
		height: 76px;
		display: block;
		float: left;
		background: url(<?php echo $server_prefix_url;?>/images/icon_indique.jpg) left no-repeat #c4c4c4;
        margin-top: 0px;
        margin-left:140px;
	    }
		div#solicitacao_copia2 a{
		    font-size: 14px;
		    color: #054c7d;
		    font-weight: bold;
		    display: block;
		    width: 572px;
		    margin-top: 30px;
		    margin-left: 92px;
		}
		    div#solicitacao_copia2 a:hover{
			color: #000000;
		    }
div#topo_email{
    width: 640px;
    height: 35px;
    display: block;
    clear: both;
}
#page_email{
    margin:0 auto;
    width:600px;
    display: block;
}
#page_email ul li {
    list-style: none;
}
#topo_email h1{
    font-size: 16px;
    color:#FFF;
    margin: 10px 0px 0px 10px;
}
#table_email{
    margin-top: 20px;
}
#instrucoes_email{
	margin: 25px 0px 0px 0px;
}
#instrucoes_email strong{
	font-size: 12px;
    color:#000;
}
#instrucoes_email span{
	color:#ff0000;
}
div#login_cliente{
    width: 860px;
    min-height: 40px;
    display: block;
    margin-top: 30px;
    margin-bottom: 15px;
}
div#login_cliente strong{
    font-size: 16px;
}
div#area_cliente_menu{
	width: 160px;
	display: block;
	float: left;
    background-color:#0f69a6;
}
div#area_cliente_menu ul li.first{
	display: block;
	width: 142px;
	height: 20px;
	color: #044977;
	background: #b5ddf8;
	border-bottom: solid 1px #c2d6e3;
	border-top: solid 1px #c2d6e3;
	padding-left: 18px;
	padding-top: 6px;
	margin-left: 0;
}
div#area_cliente_menu ul li{
	margin-bottom: 10px;
	margin-left: 18px;
}
div#area_cliente_menu ul li a{
	color:#FFF;
    font-weight:bold;
    text-decoration:none;
}
div#area_cliente_menu ul li a:hover{
	text-decoration:underline;
}
div#area_cliente_main{
	width: 685px;
	display: block;
	float: right;
    border: solid 1px #c2d6e3;
}
div#area_cliente_main p{
	margin:5px 5px 5px 5px;
}
div#area_cliente_main ul li.first{
	display: block;
	width: 667px;
	height: 20px;
	color: #044977;
	background: #b5ddf8;
	border-bottom: solid 1px #c2d6e3;
	border-top: solid 1px #c2d6e3;
	padding-left: 18px;
	padding-top: 6px;
	margin-left: 0;
}
div#area_cliente_main ul li{
	margin: 0px 18px 10px 18px;
}
div#area_cliente_main ul li a{
	color:#FFF;
    font-weight:bold;
    text-decoration:none;
}
div#area_cliente_main ul li a:hover{
	text-decoration:underline;
}
.ajax-loader{
	background-image: url(<?php echo $server_prefix_url;?>/images/ajax-loader.gif);
    background-position: top;
    background-repeat: no-repeat;
    width:31px;
    height:31px;
}
div#conteudo_formas_de_pagamento{
    width: 860px;
    display: block;
    margin-top: 20px;
}
div#conteudo_formas_de_pagamento h1{
	background: #1bb2ec;
    font-size: 20px;
    font-weight: bold;
    color: #ffffff;
    padding-left: 15px;
    padding-top: 6px;
    padding-bottom: 6px;
}
div#conteudo_depoimentos_full{
    width: 860px;
    display: block;
    margin-top: 20px;
}
div#conteudo_depoimentos_full h1{
	background: #1bb2ec;
    font-size: 20px;
    font-weight: bold;
    color: #ffffff;
    padding-left: 15px;
    padding-top: 6px;
    padding-bottom: 6px;
}
.depoimento_full{
	display:block;
    border-bottom: 1px solid #5fccf6;
    margin: 10px 0px 0px 0px;
}
.depoimento_full h2{
	font-size: 14px;
    font-weight: bold;
    margin: 0px 10px 5px 10px;
}
.depoimento_full p{
	margin: 0px 10px 5px 10px;
}
.categorias_veiculos_main{
    width: 850px;
    float: left;
    display: block;
    margin-top: 10px;
}
.categorias_veiculos_main_img{
    float: right;
    width:425px;
    height: 270px;
    font-size: 10px;
    text-align: right;
}
.categorias_veiculos_main p{
    margin: 5px 0px 10px 0px;
}
.categorias_veiculos_main2{
    width: 850px;
    display: block;
    margin: 10px 0px 10px 0px;
}
.categorias_veiculos_main2 p{
    margin: 5px 0px 10px 0px;
}
.categorias_veiculos_main2 img{
    margin: 5px 0px 10px 0px;
    display: block;
}
.categorias_veiculos{
    width: 190px;
    height: 120px;
    float: left;
    display: block;
    margin: 10px 20px 0px 0px;
}
.categorias_veiculos2{
    width: 150px;
    height: 110px;
    float: left;
    display: block;
    margin: 10px 20px 0px 0px;
}
.categorias_veiculos2 h2{
    font-size: 12px;
    font-weight: bold;
    margin: 0px 10px 5px 0px;
}

.categorias_veiculos h2{
    font-size: 12px;
    font-weight: bold;
    margin: 0px 10px 5px 0px;
}
.opcional_online {
	font-size: 14px;
    font-weight: bold;
    text-align: center;
    background-color: #FFFF99;
    padding: 20px 20px 20px 20px;
    margin: 0px 20px 0px 0px;
}
.paginacao_comparacao2{
                width: 832px;
                height: 70px;
                display: block;
                padding-top: 15px;
                clear: both;
            }
                .paginacao_comparacao2 ul{
                    display: block;
                    float: right;
                    width: 600px;
                    padding-right: 20px;
                    margin-top: 0px;
                }
                    .paginacao_comparacao2 ul li{
                        display: inline;
                        float: left;
                        margin-left: 10px;
                        color: #898989;
                    }
                        .paginacao_comparacao2 a.mais_comparacao{
                            float: right;
                            padding-right: 25px;
                        }
                            .paginacao_comparacao2 ul li a{
                                color: #898989;
                            }
                                .paginacao_comparacao2 ul li a:hover{
                                    color: #000000;
                                }
.loading_dispo {
	background-image: url(<?php echo $server_prefix_url;?>/img/disponibilidade_loader.gif);
    background-position: center;
    background-repeat: no-repeat;
    width:120px;
    height:20px;
}
.dispo_loaded {
	width:120px;
    height:20px;
}