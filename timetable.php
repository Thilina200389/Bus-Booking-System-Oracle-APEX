<!DOCTYPE html>
<html>
<head>
    <title>Today's Bus Timetable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5 p-4">
    <div class="row">
        <div class="col text-center mb-4">
            <h1 class="display-4">Bus Timetable</h1>
            <h5 class="text-muted"><?php echo date('Y-m-d'); ?></h5>
        </div>
    </div>
    
    <?php
    // YOUR EXACT API URL
    $api_url = 'https://oracleapex.com/ords/uovt_de/busbook/buses';
    
    $response = @file_get_contents($api_url);
    $data = json_decode($response, true);
    
    // Filter TODAY'S buses only (2026-01-08)
    $today_buses = [];
    if ($data && isset($data['buses'])) {
        foreach ($data['buses'] as $bus) {
            if (date('Y-m-d', strtotime($bus['departure_date'])) === date('Y-m-d')) {
                $today_buses[] = $bus;
            }
        }
    }
    
    if (empty($today_buses)) {
        echo '<div class="alert alert-warning text-center">
                <h2>🚫 No buses running today</h2>
                <p class="lead mb-0">Check back tomorrow!</p>
              </div>';
    } else {
        echo '<div class="table-responsive">
                <table class="table table-striped table-hover shadow">
                    <thead class="table-dark">
                        <tr>
                            <th>Bus Name</th>
                            <th>Number</th>
                            <th>Route</th>
                            <th>Dep. Time</th>
                            <th>Type</th>
                            <th>Seats</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
        
        foreach ($today_buses as $bus) {
            echo '<tr>
                    <td><strong>' . htmlspecialchars($bus['bus_name']) . '</strong></td>
                    <td><code>' . htmlspecialchars($bus['bus_number']) . '</code></td>
                    <td>' . htmlspecialchars($bus['route']) . '</td>
                    <td><span class="badge bg-primary fs-6">' . $bus['departure_time'] . '</span></td>
                    <td><span class="badge bg-secondary">' . $bus['type'] . '</span></td>
                    <td class="fw-bold text-success">' . $bus['capacity'] . '</td>
                    <td><button class="btn btn-outline-success btn-sm">Book Now</button></td>
                  </tr>';
        }
        echo '</tbody></table>
              <div class="text-center text-muted small">
                Showing ' . count($today_buses) . ' active bus(es) for today
              </div></div>';
    }
    ?>
</body>
</html>
