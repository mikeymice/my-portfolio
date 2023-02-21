<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Contacts</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">
<div class="p-10 w-full">

	<table class="text-xl w-full text-center border-separate">
		<thead>
			<tr>
				<th class="border p-4 w-[5%]">S.No</th>
				<th class="border p-4 w-[15%]">Name</th>
				<th class="border p-4 w-[20%]">Email</th>
				<th class="border p-4 w-[20%]">Subject</th>
				<th class="border p-4 w-[40%]">Message</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$myfile = fopen("messages.txt", "r") or die("Unable to open file!");
			$enc = fread($myfile,filesize("messages.txt"));

			$allMessages = explode('-bigSplitter-', $enc);

			for ($i=0; $i < count($allMessages); $i++) { 
				if($allMessages[$i] != ""){

					$allFields = explode('-splitter-', $allMessages[$i]);
					$serial = $i+1;
					$name = $allFields[0];
					$email = $allFields[1];
					$subject = $allFields[2];
					$msg = $allFields[3];

					echo '
					<tr>
						<td class="border p-2">'.$serial.'</td>
						<td class="border p-2">'.$name.'</td>
						<td class="border p-2">'.$email.'</td>
						<td class="border p-2">'.$subject.'</td>
						<td class="border p-2 pl-4 text-left">'.$msg.'</td>
					</tr>
					';

				}
			}

			fclose($myfile);


			?>
			
		</tbody>
	</table>

</div>
</body>
</html>