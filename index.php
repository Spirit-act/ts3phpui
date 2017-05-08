<!DOCTYPE html>
<html>
	<head>
		<title>TS3 UserInterface</title>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/bt/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/standard.css">
		<link rel="stylesheet" type="text/css" href="css/tsviewer.css">
	</head>
	<body>
		<?php
			// Libary
			require_once('inc/TeamSpeak3.php');

			// connect to server
			require_once('inc/conn.php');

			// Select All Clients
			$all = $Vserver->clientList();

			//Channel
			$allchannel = $Vserver->ChannelList();
		?>
		<div class="col-md-12" style="height: 100px;"></div>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h2 class="center">Spirit-Corp.com TS3 User Interface</h2>
			<br>
			<div class="col-md-6">
				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<select class="form-control" name="username">
								<optgroup label="User">
								<?php
									echo '<option>Pick a User</option>';
									// Print Users 
									foreach($all as $ts3_Client) {
										if (strpos($ts3_Client, 'bot') == false) {
											echo '<option value="'.$ts3_Client.'">'.$ts3_Client.'</option>';
										}
									}
									echo '<optgroup label="Bot">';
									foreach($all as $ts3_Client) {
										if (strpos($ts3_Client, 'bot') == true) {
											echo '<option value="'.$ts3_Client.'" disabled>'.$ts3_Client.'</option>';
										}
									}
								?>
							</select>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<textarea type="text" class="form-control" name="message" placeholder="Message"></textarea>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="poke" value="poke"> Poke a Client
							</label>
						</div>
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> &nbsp; Send</button>
					</div>
				</form>
				<hr>
				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<select class="form-control" name="uname">
								<optgroup label="User"></optgroup>
								<?php
									echo '<option>Pick a User</option>';
									// Print Users 
									foreach($all as $ts3_Client) {
										if (strpos($ts3_Client, 'bot') != true) {
											echo '<option value="'.$ts3_Client.'">'.$ts3_Client.'</option>';
										}
									}
									echo '<optgroup label="Bot">';
									foreach($all as $ts3_Client) {
										if (strpos($ts3_Client, 'bot') != false) {
											echo '<option value="'.$ts3_Client.'" disabled>'.$ts3_Client.'</option>';
										}
									}
								?>
							</select>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input class="form-control" type="text" name="kickmsg" placeholder="Message">
						</div>
						<br>
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> &nbsp; Kick</button>
					</div>
				</form>
				<hr>
				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<select class="form-control" name="mtarget">
								<optgroup label="User"></optgroup>
								<?php
									echo '<option>Pick a User</option>';
									// Print Users 
									foreach($all as $ts3_Client) {
										if (strpos($ts3_Client, 'bot') != true) {
											echo '<option value="'.$ts3_Client.'">'.$ts3_Client.'</option>';
										}
									}
									echo '<optgroup label="Bot">';
									foreach($all as $ts3_Client) {
										if (strpos($ts3_Client, 'bot') != false) {
											echo '<option value="'.$ts3_Client.'" disabled>'.$ts3_Client.'</option>';
										}
									}
								?>
							</select>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-bars"></i></span>
							<select class="form-control" name="msolve">
								<?php
									echo '<option>Pick a Channel</option>';
									// Print Users 
									foreach($allchannel as $ts3_Channel) {
										echo '<option value="'.$ts3_Channel.'">'.$ts3_Channel.'</option>';
									}
								?>
							</select>
						</div>
						<br>
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> &nbsp; Move</button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<?php
					// Var for Msg
					@$user = $_POST['username'];
					@$usern = $_POST['uname'];
					@$choice = $_POST['poke'];

					// Var for Kick
					@$msg = $_POST['message'];
					@$kmsg = $_POST['kickmsg'];

					// var for Move
					@$muser = $_POST['mtarget'];
					@$mziel = $_POST['msolve'];

					if ($user != '') {
						$ts3_Client = $Vserver->clientGetByName($user);
						if ($choice == 'poke') {
							$ts3_Client->poke($msg);	// Pokes Clients
						} else {
							$ts3_Client->message($msg);	// Write Privat Textmessages
						}
					}

					if ($usern != '') {
						$ts3_Client = $Vserver->clientGetByName($usern);
						$Vserver->ClientKick($ts3_Client, TeamSpeak3::KICK_SERVER, $kmsg);
					}

					if ($muser != '') {
						$ts3_Client = $Vserver->clientGetByName($muser);
						$ts3_Channel = $Vserver->channelGetByName($mziel);
						$Vserver->clientMove($ts3_Client, $ts3_Channel);
					}

					//build
					// backup : echo $Vserver->getViewer(new TeamSpeak3_Viewer_Html("images/viewer/", "images/countryflags/", "data:image"));
					echo $Vserver->getViewer(new TeamSpeak3_Viewer_Html("images/viewer/"));
				?>
			</div>
		</div>
		<div class="col-md-2"></div>
	</body>
</html>
