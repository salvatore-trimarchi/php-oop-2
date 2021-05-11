<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>php-oop-2</title>
</head>
<body>
	<?php
	ini_set('display_errors',1);
	/*

	repo esercizio: php-oop-2
	Crea un diagramma per una tabella di db che rappresenti gli Users di un blog.
	Crea una classe User che rappresenti quella tabella, 
	e usala per stampare in pagina i dati di alcuni Users.
	Il database e la tabella non devono essere realmente creati.
	BONUS: utilizzare extends, traits 
	per estendere la nostra classe principale, 
	come visto durante la lezione del mattino.

	# TABLE: blog_users #
	----------------------------------------------------------
	id 					NUMBER	SMALL			PRIMARY_KEY
	name				STRING	VARCHAR(50)		NOT NULL
	surname				STRING	VARCHAR(50)		NOT NULL
	email				STRING	VARCHAR(50)		NOT NULL
	role				STRING	VARCHAR(20)		NOT NULL
	username			STRING	VARCHAR(20)		NOT NULL
	password_hash		STRING	VARCHAR(20)		NOT NULL
	profile_desc		STRING	VARCHAR(200)	NULL
	birth_date			STRING	DATE			NOT NULL
	adult_bool			BOOLEAN	TINYINT			NOT NULL
	subscription_date	STRING	DATE			NOT NULL
	last_login_date		STRING	DATE			NOT NULL
	chuck_norris_status	BOOLEAN	TINYINT			NULL
	----------------------------------------------------------
	*/

	// # DEPENDENCIES # 
	require_once 'User.php';
	require_once 'Admin.php';

	// # CLASS STRUCTURE # 
	echo '<hr>';
	var_dump(get_class_vars('User'));
	var_dump(get_class_methods('User'));
	echo '<hr>';
	var_dump(get_class_vars('Admin'));
	var_dump(get_class_methods('Admin'));
	echo '<hr>';

	// % USERS % 

	$users = [];

	// CHUCK NORRIS 

	$users[0] = new Admin('Chuck','Norris','chuck@norris.com','admin');
	$users[0]->chuck_norris_status 	= true;
	$users[0]->username 			= 'chuck40';
	$users[0]->password_hash 		= 'chuck40';
	$users[0]->profile_desc 		= 'Chuck Norris non porta l\'orologio. Decide lui che ora è.';
	$users[0]->birth_date 			= date_create('1940-03-10');
	$users[0]->subscription_date 	= date_create('1940-03-10');
	$users[0]->last_login_date 		= date_create(date('Y-m-d'));
	try {
		$users[0]->checkAge($users[0]->birth_date);
	} catch (Exception $e) {
		echo $e->getMessage();
	}


	var_dump($users);
	echo '<hr>';
	////////////////////////////////////////////////////////////////////
	// $now = date_create(date('Y-m-d'));
	// var_dump($now);
	// $birth_date = date_create('1940-03-10');
	// var_dump($birth_date);
	// $age = date_diff($now,$birth_date);
	// var_dump($age);
	////////////////////////////////////////////////////////////////////

	?>	

	<?php foreach ($users as $user) { ?>
		<table>
			<?php foreach (get_class_vars('User') as $key => $value) { ?>
				<tr>
					<td><?php echo $key ?></td>
					<td>
						<?php
							if ($key=='birth_date'||$key=='subscription_date'||$key=='last_login_date') {
								echo $user->$key->format('d F Y');
							} else {
								echo $user->$key;
							}
						?>
					</td>				
				</tr>

			<?php } ?>
		</table>
	<?php } ?>

</body>
</html>

