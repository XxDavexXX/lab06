

<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup">Nueva Matricula</h2>
        <form action="agregar_nuevo_matricula.php" method="post">
		<div class="form-holder">
        <select class="input" name="codigo" id="">
        <?php 
                function conectar(){
                    $xc = mysqli_connect('localhost',"root","","laboratorio10");
                    return $xc;
                }
            
                function desconectar($xc){
                    mysqli_close($xc);
                }
            
                $xc = conectar();
                $sql ="SELECT * FROM  alumnos WHERE estado=1";
                $res = mysqli_query($xc,$sql);
                if ($res) {
                        while($row = mysqli_fetch_assoc($res)) {
                            echo '<option class="input fav" value="'.$row["codigo"].'">'.$row["nombres"].' '.$row["apellidos"].'</option>';
                        }
                } else {
                    echo "Ha ocurrido un error al intentar eliminar el usuario.";
                }

                
                desconectar($xc);
        ?>
        </select>
        <select class="input" name="id_curso" id="">
        <?php 
                $xc = conectar();
                $sql ="SELECT * FROM  cursos WHERE estado=1";
                $res = mysqli_query($xc,$sql);
                if ($res) {
                        while($row = mysqli_fetch_assoc($res)) {
                            echo '<option class="input fav" value="'.$row["id_curso"].'">'.$row["nombre_curso"].'</option>';
                        }
                } else {
                    echo "Ha ocurrido un error al intentar eliminar el usuario.";
                }

                
                desconectar($xc);
        ?>
        </select>
        <select class='input' name="turno" id="">
            <option value="Mañana">Mañana</option>
            <option value="Tarde">Tarde</option>
            <option value="Noche">Noche</option>
            <option value="Madrugada">Madrugada</option>
        </select>
		</div>
        <input class="submit-btn" type="submit" value="Agregar nueva Matricula">
        </form>
	</div>
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login">Dave Ryan - Form</h2>
		</div>
	</div>
</div>


<style>
    @import url("https://fonts.googleapis.com/css?family=Fira+Sans");

.fav{
    margin-top:10px;
}

html,
body {
	position: relative;
	min-height: 100vh;
	background-color: #e1e8ee;
	display: flex;
	align-items: center;
	justify-content: center;
	font-family: "Fira Sans", Helvetica, Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.form-structor {
	background-color: #222;
	border-radius: 15px;
	height: 550px;
	width: 350px;
	position: relative;
	overflow: hidden;

	&::after {
		content: "";
		opacity: 0.8;
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background-repeat: no-repeat;
		background-position: center;
		background-size: 900px;
		background-image: url("https://images.unsplash.com/photo-1619796124432-c8b1670a190b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE3fHx8ZW58MHx8fHw%3D&w=1000&q=80");
	}

	.signup {
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		width: 65%;
		z-index: 5;
		-webkit-transition: all 0.3s ease;

		&.slide-up {
			top: 5%;
			-webkit-transform: translate(-50%, 0%);
			-webkit-transition: all 0.3s ease;
		}

		&.slide-up .form-holder,
		&.slide-up .submit-btn {
			opacity: 0;
			visibility: hidden;
		}

		&.slide-up .form-title {
			font-size: 1em;
			cursor: pointer;
		}

		&.slide-up .form-title span {
			margin-right: 5px;
			opacity: 1;
			visibility: visible;
			-webkit-transition: all 0.3s ease;
		}

		.form-title {
			color: #fff;
			font-size: 1.7em;
			text-align: center;

			span {
				color: rgba(0, 0, 0, 0.4);
				opacity: 0;
				visibility: hidden;
				-webkit-transition: all 0.3s ease;
			}
		}

		.form-holder {
			border-radius: 15px;
			background-color: #fff;
			overflow: hidden;
			margin-top: 50px;
			opacity: 1;
			visibility: visible;
			-webkit-transition: all 0.3s ease;

			.input {
				border: 0;
				outline: none;
				box-shadow: none;
				display: block;
				height: 30px;
				line-height: 30px;
				padding: 8px 15px;
				border-bottom: 1px solid #eee;
				width: 100%;
				font-size: 12px;

				&:last-child {
					border-bottom: 0;
				}
				&::-webkit-input-placeholder {
					color: rgba(0, 0, 0, 0.4);
				}
			}
		}

		.submit-btn {
			background-color: rgba(0, 0, 0, 0.4);
			color: rgba(256, 256, 256, 0.7);
			border: 0;
			border-radius: 15px;
			display: block;
			margin: 15px auto;
			padding: 15px 45px;
			width: 100%;
			font-size: 13px;
			font-weight: bold;
			cursor: pointer;
			opacity: 1;
			visibility: visible;
			-webkit-transition: all 0.3s ease;

			&:hover {
				transition: all 0.3s ease;
				background-color: rgba(0, 0, 0, 0.8);
			}
		}
	}

	.login {
		position: absolute;
		top: 20%;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #fff;
		z-index: 5;
		-webkit-transition: all 0.3s ease;

		&::before {
			content: "";
			position: absolute;
			left: 50%;
			top: -20px;
			-webkit-transform: translate(-50%, 0);
			background-color: #fff;
			width: 200%;
			height: 250px;
			border-radius: 50%;
			z-index: 4;
			-webkit-transition: all 0.3s ease;
		}

		.center {
			position: absolute;
			top: calc(50% - 10%);
			left: 50%;
			-webkit-transform: translate(-50%, -50%);
			width: 65%;
			z-index: 5;
			-webkit-transition: all 0.3s ease;

			.form-title {
				color: #000;
				font-size: 1.7em;
				text-align: center;

				span {
					color: rgba(0, 0, 0, 0.4);
					opacity: 0;
					visibility: hidden;
					-webkit-transition: all 0.3s ease;
				}
			}

			.form-holder {
				border-radius: 15px;
				background-color: #fff;
				border: 1px solid #eee;
				overflow: hidden;
				margin-top: 50px;
				opacity: 1;
				visibility: visible;
				-webkit-transition: all 0.3s ease;

				.input {
					border: 0;
					outline: none;
					box-shadow: none;
					display: block;
					height: 30px;
					line-height: 30px;
					padding: 8px 15px;
					border-bottom: 1px solid #eee;
					width: 100%;
					font-size: 12px;

					&:last-child {
						border-bottom: 0;
					}
					&::-webkit-input-placeholder {
						color: rgba(0, 0, 0, 0.4);
					}
				}
			}

			.submit-btn {
				background-color: #6b92a4;
				color: rgba(256, 256, 256, 0.7);
				border: 0;
				border-radius: 15px;
				display: block;
				margin: 15px auto;
				padding: 15px 45px;
				width: 100%;
				font-size: 13px;
				font-weight: bold;
				cursor: pointer;
				opacity: 1;
				visibility: visible;
				-webkit-transition: all 0.3s ease;

				&:hover {
					transition: all 0.3s ease;
					background-color: rgba(0, 0, 0, 0.8);
				}
			}
		}

		&.slide-up {
			top: 90%;
			-webkit-transition: all 0.3s ease;
		}

		&.slide-up .center {
			top: 10%;
			-webkit-transform: translate(-50%, 0%);
			-webkit-transition: all 0.3s ease;
		}

		&.slide-up .form-holder,
		&.slide-up .submit-btn {
			opacity: 0;
			visibility: hidden;
			-webkit-transition: all 0.3s ease;
		}

		&.slide-up .form-title {
			font-size: 1em;
			margin: 0;
			padding: 0;
			cursor: pointer;
			-webkit-transition: all 0.3s ease;
		}

		&.slide-up .form-title span {
			margin-right: 5px;
			opacity: 1;
			visibility: visible;
			-webkit-transition: all 0.3s ease;
		}
	}
}
</style>