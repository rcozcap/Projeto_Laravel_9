<div class="container" style="background-color:#d2e4e2; margin-top: 15%; box-shadow: 0 100vh 0 100vh #d2e4e2;">
    <!----------- Footer ------------>

    <style>
        .footer-bs {
    font-size: 14px;        
	padding: 0.1% 2%;
	color: #012925;
    height: 50%;
        }
          
  #menu_links{
    color: #012925;
    font-size: 18px;
  }      
  #menu_links:hover{
    color: #046e39;
  }      

    </style>
    <footer class="footer-bs">
        <div class="row">
        	<div class="col-md-3 footer-brand animated fadeInLeft">
            	<img class="img-fluid" style="width:100px; height:100px;" src="{{ env('APP_URL')}}/storage/images/seg1.png">
                <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula.</p>
            </div>
        	<div class="col-md-4 footer-nav animated fadeInUp text-center">
            	<h4>Menu</h4>
            	<div class="col-xs-8 col-sm-8 col-md-12 mt-3">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a id="menu_links" href="#">Menu</a></li>
                        <li class="list-inline-item"><a id="menu_links" href="#">Postagens</a></li>
                        <li class="list-inline-item"><a id="menu_links" href="#">Eventos</a></li>
                        <li class="list-inline-item"><a id="menu_links" href="#">Início</a></li>
                    </ul>
                </div>
            </div>
        	<div class="col-xs-8 col-sm-8 col-md-2 mt-5">
                <ul class="list-unstyled list-inline social text-center">
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i id="menu_links" class="fa fa-facebook fa-lg"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i id="menu_links" class="fa fa-twitter fa-lg"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i id="menu_links" class="fa fa-instagram fa-lg"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i id="menu_links" class="fa fa-google-plus fa-lg"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i id="menu_links" class="fa fa-envelope fa-lg"></i></a></li>
                </ul>
            </div>
        	<div class="col-md-3 footer-ns animated fadeInRight text-center">
            	<h4>Pesquisa Externa</h4>
                <p>Pesquise no Google caso necessite de conteúdo adicional</p>
            
                <div class="col-md-12 text-center">
                        <form method="get" action="https://www.google.com/search">
                        <div class="d-table-cell w-100">
                            <input style="margin-left:10%;" type="text" name="q" value="" class="form-control" placeholder="Digite sua pesquisa...">
                        </div>
                            <div class="d-table-cell align-middle">
                            <button style="margin-left:80%;" class="btn btn-default" type="submit"><span id="menu_links" class="fa fa-search"></span></button>
                        </div>
                       
                    </form>
                </div><!-- /input-group -->
             
            </div>
        </div>
    </footer>
    <section style="text-align:center; padding-top:1%; color:#012925;"><p>Desenvolvido por <a id="menu_links" href="http://enfoplus.net">Ricardo de Freitas Leite</a>© 2021 BS3 UI Kit, Todos os direitos reservados</p></section>

</div>