<!DOCTYPE html>
<html>
<head>
    <title>ApiLens Dashboard</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .card { display: inline-block; padding: 20px; margin: 10px; background: #f5f5f5; }
        table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>

<h1>🚀 ApiLens Dashboard</h1>

<div class="card">Total Requests: {{ $total }}</div>
<div class="card">Errors: {{ $errors }}</div>
<div class="card">Avg Response: {{ round($avgTime, 2) }} ms</div>

<h2>🔥 Top Endpoints</h2>
<table>
    <tr><th>Endpoint</th><th>Hits</th></tr>
    @foreach($topEndpoints as $item)
        <tr>
            <td>{{ $item->endpoint }}</td>
            <td>{{ $item->total }}</td>
        </tr>
    @endforeach
</table>

<h2>🐢 Slow Endpoints</h2>
<table>
    <tr><th>Endpoint</th><th>Avg Time (ms)</th></tr>
    @foreach($slowEndpoints as $item)
        <tr>
            <td>{{ $item->endpoint }}</td>
            <td>{{ round($item->avg_time, 2) }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>