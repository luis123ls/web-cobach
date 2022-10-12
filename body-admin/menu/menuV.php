<div class="left-side-bar">
    <br>
    <div class="brand-logo">
        <a href="index.php">
				<img src="../vendors/img/logo1.png" alt="" class="dark-logo">
				<img src="../vendors/img/logo1.png" alt="" class="light-logo">
            <br>
            <br>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <br>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <?php
				switch ($tipo) {
				//admin
				case '1':
				echo "
				
				<li class='dropdown'>
					<a href='javascript:;' class='dropdown-toggle'>
						<span class='micon dw dw-house-1'></span><span class='mtext'>Cotizador</span>
					</a>
					<ul class='submenu'>
						<li><a href='index.php'>PARTNER</a></li>
						<li><a href='index2.php'>PARTNER JR</a></li>
					</ul>
				</li>
				<li class='dropdown'>
					<a href='javascript:;' class='dropdown-toggle'>
						<span class='micon dw dw dw-user1'></span><span class='mtext'>Cliente</span>						
					</a>
					<ul class='submenu'>
						<li><a href='form-basic.php'>Registrar</a></li>
						<li><a href='list-client.php'>Lista de clientes</a></li>
					</ul>
				</li>
				<li>
					<a href='cal.php' class='dropdown-toggle no-arrow'>
						<span class='micon dw dw-calendar1'></span><span class='mtext'>Calendario</span>
					</a>
				</li>
				<li>
					<a href='highchart.php' class='dropdown-toggle no-arrow'>
						<span class='micon dw dw-analytics-21'></span><span class='mtext'>Estadistica</span>
					</a>
				</li>				
				<li>
					<a href='#' class='dropdown-toggle no-arrow'>
						<span class='micon dw dw-invoice'></span><span class='mtext'>Contrato</span>
					</a>
				</li> ";
				break;


				case '2':
					echo "
					
					<li class='dropdown'>
						<a href='javascript:;' class='dropdown-toggle'>
							<span class='micon dw dw-house-1'></span><span class='mtext'>Cotizador</span>
						</a>
						<ul class='submenu'>
							<li><a href='index.php'>PARTNER</a></li>
							<li><a href='index2.php'>PARTNER JR</a></li>
						</ul>
					</li>
					<li class='dropdown'>
						<a href='javascript:;' class='dropdown-toggle'>
							<span class='micon dw dw dw-user1'></span><span class='mtext'>Cliente</span>						
						</a>
						<ul class='submenu'>
							<li><a href='form-basic.php'>Registrar</a></li>
							<li><a href='list-client.php'>Lista de clientes</a></li>
						</ul>
					</li>
					<li>
						<a href='calendar.php' class='dropdown-toggle no-arrow'>
							<span class='micon dw dw-calendar1'></span><span class='mtext'>Calendario</span>
						</a>
					</li>
					<li>
						<a href='highchart.php' class='dropdown-toggle no-arrow'>
							<span class='micon dw dw-analytics-21'></span><span class='mtext'>Estadistica</span>
						</a>
					</li>				
					<li>
						<a href='#' class='dropdown-toggle no-arrow'>
							<span class='micon dw dw-invoice'></span><span class='mtext'>Contrato</span>
						</a>
					</li> ";
					break;

				case '3':
					echo "
					
					<li class='dropdown'>
						<a href='javascript:;' class='dropdown-toggle'>
							<span class='micon dw dw-house-1'></span><span class='mtext'>Cotizador</span>
						</a>
						<ul class='submenu'>
							<li><a href='index.php'>PARTNER</a></li>
							<li><a href='index2.php'>PARTNER JR</a></li>
						</ul>
					</li>
					<li>
						<a href='calendar.php' class='dropdown-toggle no-arrow'>
							<span class='micon dw dw-calendar1'></span><span class='mtext'>Calendario</span>
						</a>
					</li>
					<li>
						<a href='highchart.php' class='dropdown-toggle no-arrow'>
							<span class='micon dw dw-analytics-21'></span><span class='mtext'>Estadistica</span>
						</a>
					</li>				
					";
					break;
	
				}
				?>
            </ul>
        </div>
    </div>
</div>