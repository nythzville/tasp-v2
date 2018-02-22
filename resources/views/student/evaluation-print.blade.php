<!DOCTYPE html>
<html>
<head>
	<title>Daily Evaluation</title>
</head>
<body>

<table border="1" width="500">
	<tbody>
		<tr>
			<td>Name: {{ $student->lastname }} {{ $student->firstname }}</td>
		</tr>
		<tr>
			<td>Date: {{ $class->evaluation->date }}</td>
		</tr>
		<tr>
			<td>Attendance: {{ $class->evaluation->attendance }}</td>
		</tr>
		<tr>
			<td>Subject: {{ $class->evaluation->subject }}</td>
		</tr>
		<tr>
			<td>Topic: {{ $class->evaluation->topic }}</td>
		</tr>
		<tr>
			<td>Comment: {{ $class->evaluation->comment }}</td>

		</tr>
	</tbody>
</table>
</body>
</html>
<script type="text/javascript">
	window.print();
</script>