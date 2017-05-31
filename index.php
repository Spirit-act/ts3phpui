<!DOCTYPE html>
<html>
	<head>
		<title>TS3 UserInterface</title>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="comp/bt/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="comp/standard.css">
		<link rel="stylesheet" type="text/css" href="comp/style.css">
		
		<!-- JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<!-- Custom Script -->
		<script type="text/javascript" src="comp/script.js"></script>
	</head>
	<body>
		<?php
			// Libary
			require_once('inc/TeamSpeak3.php');

			// connect to server
			require_once('inc/conn.php');

			// List all Clients
			$all = $Vserver->clientList();

			// List all Channel
			$allchannel = $Vserver->ChannelList();
		?>
		<div class="col-md-12" style="height: 100px;"></div>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h2 class="center">Spirit TS3 User Interface</h2>
			<br>
			<div class="col-md-6">
				<div class="navibar">
					<ul class="nav nav-pills" id="functionsnav">
						<li><a href="#" data-target="#msg">Msg</a></li>
						<li><a href="#" data-target="#kick">Kick</a></li>
						<li><a href="#" data-target="#move">Move</a></li>
						<li><a href="#" data-target="#ban">Ban</a></li>
						<li><a href="#" data-target="#info">Info</a></li>
					</ul>
				</div>
				<hr>
				<div class="functions" id="functions">
					<!-- MSG User -->
					<div class="msg" id="msg">
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
										echo '<optgroup label="Bot"></optgroup>';
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
								<br>
								<div class="fright" data-toggle="buttons">
									<label class="btn btn-primary">
										<input type="checkbox" name="poke" value="poke"> Poke a Client
									</label>
								</div>
								<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> &nbsp; Send</button>
							</div>
						</form>
					</div>
					<hr>
					<!-- Kick User -->
					<div class="kick" id="kick">
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
										echo '<optgroup label="Bot"></optgroup>';
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
								<div class="fright" data-toggle="buttons">
									<label class="btn btn-primary">
										<input type="checkbox" name="reasonid" value="channelkick"> Kick Client from Channel
									</label>
								</div>
								<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> &nbsp; Kick</button>
							</div>
						</form>
					</div>
					<hr>
					<!-- Move User -->
					<div class="move" id="move">
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
										echo '<optgroup label="Bot"></optgroup>';
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
					<hr>
					<!-- Ban User -->
					<div class="ban" id="ban">
						<form method="post">
							<div class="form-group">
								<!-- Preset Selector -->
								<div class="input-group">
									<div class="btn-group" data-toggle="buttons" id="pre">
										<label class="btn btn-primary active">
											<input type="radio" name="preset" value="" id="self"> Type an own Message
										</label>
										<label class="btn btn-primary">
											<input type="radio" name="preset" value="spam" id="spam"> Spam
										</label>
										<label class="btn btn-primary">
											<input type="radio" name="preset" value="undis" id="undis"> undesirable
										</label>
									</div>
								</div>
								<br>
								<!-- User Selector -->
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select class="form-control" name="buser">
										<optgroup label="User"></optgroup>
										<?php
											echo '<option>Pick a User</option>';
											// Print Users 
											foreach($all as $ts3_Client) {
												if (strpos($ts3_Client, 'bot') != true) {
													echo '<option value="'.$ts3_Client.'">'.$ts3_Client.'</option>';
												}
											}
											echo '<optgroup label="Bot"></optgroup>';
											foreach($all as $ts3_Client) {
												if (strpos($ts3_Client, 'bot') != false) {
													echo '<option value="'.$ts3_Client.'" disabled>'.$ts3_Client.'</option>';
												}
											}
										?>
									</select>
								</div>
								<br>
								<!-- Ban Msg Input -->
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="text" class="form-control" name="banmessage" placeholder="Message" id="banmsginput">
								</div>
								<br>
								<div class="form-inline">
									<!-- Time Value Selector -->
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
										<input class="form-control" type="number" name="bantimevalue" placeholder="Value" id="bantimevalue">
									</div>
									<!-- Sec | Min | Hour | Perm Selector -->
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
										<select class="form-control" name="bantime" id="bansel">
											<option value="sec">Seconds</option>
											<option value="min">Minutes</option>
											<option value="hour">Hours</option>
											<option value="day">Days</option>
											<option value="perm">Permanent (10 years)</option>
										</select>
									</div>
								</div>
								<br>
								<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> &nbsp; Ban</button>
							</div>
						</form>
					</div>
					<hr>
					<!-- Information about User -->
					<div class="info" id="info">
						<form method="post">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select class="form-control" name="infouser">
										<optgroup label="User"></optgroup>
										<?php
											echo '<option>Pick a User</option>';
											// Print Users 
											foreach($all as $ts3_Client) {
												if (strpos($ts3_Client, 'bot') != true) {
													echo '<option value="'.$ts3_Client.'">'.$ts3_Client.'</option>';
												}
											}
										echo '<optgroup label="Bot"></optgroup>';
											foreach($all as $ts3_Client) {
												if (strpos($ts3_Client, 'bot') != false) {
													echo '<option value="'.$ts3_Client.'" disabled>'.$ts3_Client.'</option>';
												}
											}
										?>
									</select>
								</div>
								<br>
								<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> &nbsp; Info</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php
					// Var for Msg
					@$user = $_POST['username'];
					@$msg = $_POST['message'];
					@$choice = $_POST['poke'];

					// Var for Kick
					@$usern = $_POST['uname'];
					@$kmsg = $_POST['kickmsg'];
					@$reasid = $_POST['reasonid'];

					// var for Move
					@$muser = $_POST['mtarget'];
					@$mziel = $_POST['msolve'];

					// var for Info
					@$iuser = $_POST['infouser'];

					// var for Ban
					@$banid = $_POST['preset'];
					@$banuser = $_POST['buser'];
					@$banmsg = $_POST['banmessage'];
					@$btime = $_POST['bantime'];
					@$btimevalue = $_POST['bantimevalue'];

					// MSG User
					if ($user != '') {
						$ts3_Client = $Vserver->clientGetByName($user);
						if ($choice == 'poke') {
							$ts3_Client->poke($msg);	// Pokes Clients
						} else {
							$ts3_Client->message($msg);	// Write Privat Textmessages
						}
					}

					// Kick User
					if ($usern != '') {
						$ts3_Client = $Vserver->clientGetByName($usern);
						if ($reasid == 'channelkick') {
							$rid = TeamSpeak3::KICK_CHANNEL;
						} else {
							$rid = TeamSpeak3::KICK_SERVER;
						}
						$Vserver->ClientKick($ts3_Client, $rid, $kmsg);
					}

					// Move User
					if ($muser != '') {
						$ts3_Client = $Vserver->clientGetByName($muser);
						$ts3_Channel = $Vserver->channelGetByName($mziel);
						$Vserver->clientMove($ts3_Client, $ts3_Channel);
					}

					// Ban
					if ($banuser != '') {
						if ($btime == 'sec') {
							$btimeval = $btimevalue;
						} elseif ($btime == 'min') {
							$btimeval = $btimevalue * 60;
						} elseif ($btime == 'hour') {
							$btimeval = $btimevalue * 3600;
						} elseif ($btime == 'day') {
							$btimeval = $bantimevalue * 86400;
						} elseif ($btime = 'perm') {
							$btimeval = 315360000;
						} else {
							$btimeval = NULL;
						}
						$ts3_Client = $Vserver->clientGetByName($banuser);
						$id = $ts3_Client->getId();
						if ($banid == 'spam') {
							$banmsg = 'Your wrote something unacceptable';
						} elseif ($banid == 'undis') {
							$banmsg = 'We don´t like you or We don´t want you on our ts';
						}
						$Vserver->clientBan($ts3_Client, $btimeval, $banmsg);
					}

					// Info User
					if ($iuser != '') {
						$ts3_Client = $Vserver->clientGetByName($iuser);
						$info = $ts3_Client->getInfo();
						echo '<div class="modal" style="display: block;" id="mod"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" id="close"><span>&times;</span></button><h4>Info for "'.$ts3_Client.'"</h4></div><div class="modal-body"><div class="ioutput">';
						foreach ($info as $key => $value) {
							echo $key.' - '.$value.'<br>';
						}
						echo '</div></div><div class="modal-footer"><a href="" class="btn btn-danger">Safe as TXT</a></div></div></div></div>';
					}

					// TS Viewer
					// backup : echo $Vserver->getViewer(new TeamSpeak3_Viewer_Html("images/viewer/", "images/countryflags/", "data:image"));
					echo $Vserver->getViewer(new TeamSpeak3_Viewer_Html("images/viewer/"));
				?>
			</div>
		</div>
		<div class="col-md-2"></div>
	</body>
</html>
