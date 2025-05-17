<!DOCTYPE html>
<html>
<head>
    <title>Production Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Production Report ID: {{ $report->id }}</h2>
    <p><strong>Date:</strong> {{ $report->production_date }}</p>
    <p><strong>Line:</strong> {{ $report->line }}</p>
    <p><strong>Shift:</strong> {{ $report->shift }}</p>

    <h4>AC Output</h4>
    <ul>
        <li>AC1: {{ $report->ac1 }}</li>
        <li>AC2: {{ $report->ac2 }}</li>
        <li>AC3: {{ $report->ac3 }}</li>
        <li>AC4: {{ $report->ac4 }}</li>
    </ul>

    <h4>Status: {{ $report->status }}</h4>
</body>
</html>
