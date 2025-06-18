<?php
// Dashboard data - you can modify these values or fetch from database
$completion_percentage = 50;
$new_tasks = 14;
$completed_tasks = 8;
$pending_tasks = 5;
$manager_name = "Services Manager";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Chart</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Easy Pie Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        :root {
            --primary-color: #E74C3C;
            --secondary-color: #6c757d;
            --background-color: #f8f9fa;
            --card-shadow: 0 2px 15px rgba(0,0,0,0.08);
            --card-hover-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        body {
            background-color: var(--background-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dashboard-container {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin: 20px auto;
            max-width: 1200px;
        }

        .header-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 1px solid #dee2e6;
        }

        .header-section h2 {
            color: #495057;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .header-section p {
            color: var(--secondary-color);
            margin-bottom: 0;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--card-hover-shadow);
        }

        .chart-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .progress-chart {
            position: relative;
            width: 70px;
            height: 70px;
            margin: 0 auto;
        }

        .progress-chart canvas {
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress-value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .task-number {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .task-label {
            font-size: 12px;
            color: var(--secondary-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .menu-dots {
            cursor: pointer;
            padding: 5px;
        }

        .menu-dots span {
            width: 3px;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: block;
            margin: 2px 0;
        }

        .table-section {
            background: var(--background-color);
            border-top: 1px solid #dee2e6;
        }

        .table-placeholder {
            background: white;
            border-radius: 8px;
            border: 2px dashed #dee2e6;
            color: var(--secondary-color);
        }

        /* Custom chart colors for different cards */
        .chart-success .progress-chart canvas {
            /* This will be handled by JavaScript */
        }
        
        .chart-warning .progress-chart canvas {
            /* This will be handled by JavaScript */
        }

        @media (max-width: 768px) {
            .stat-card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="dashboard-container">
            <!-- Header Section -->
            <div class="header-section text-center py-4">
                <h2><?php echo $manager_name; ?></h2>
                <p>Dashboard Overview</p>
            </div>

            <!-- Content Section -->
            <div class="p-4">
                <div class="row g-3 mb-4">
                    <!-- Card 1: New Tasks -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stat-card p-3">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="chart-container">
                                        <div class="progress-chart" data-percent="<?php echo $completion_percentage; ?>" data-color="#E74C3C">
                                            <span class="progress-value"><?php echo $completion_percentage; ?>%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    <div class="d-flex justify-content-end mb-2">
                                        <div class="menu-dots">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="task-number"><?php echo $new_tasks; ?></div>
                                    <div class="task-label">New Tasks</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Completed Tasks -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stat-card p-3 chart-success">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="chart-container">
                                        <div class="progress-chart" data-percent="75" data-color="#28a745">
                                            <span class="progress-value">75%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    <div class="task-number" style="color: #28a745;"><?php echo $completed_tasks; ?></div>
                                    <div class="task-label">Completed</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Pending Tasks -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stat-card p-3 chart-warning">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="chart-container">
                                        <div class="progress-chart" data-percent="30" data-color="#ffc107">
                                            <span class="progress-value">30%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    <div class="task-number" style="color: #ffc107;"><?php echo $pending_tasks; ?></div>
                                    <div class="task-label">Pending</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-section p-4">
                <div class="table-placeholder text-center p-4">
                    <p class="mb-0">Table will be added here</p>
                    <!-- Add your table here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Wait for DOM to be fully loaded
            setTimeout(function() {
                // Initialize Easy Pie Chart for all charts with custom colors
                $('.progress-chart').each(function() {
                    var $this = $(this);
                    var color = $this.data('color') || '#E74C3C';
                    
                    $this.easyPieChart({
                        size: 70,
                        barColor: color,
                        trackColor: '#f1f1f1',
                        scaleColor: false,
                        lineWidth: 6,
                        animate: {
                            duration: 2000,
                            enabled: true
                        },
                        onStep: function(from, to, percent) {
                            $(this.el).find('.progress-value').text(Math.round(percent) + '%');
                        }
                    });
                });
            }, 100);

            // Add hover effects
            $('.stat-card').hover(
                function() {
                    $(this).addClass('shadow-lg');
                },
                function() {
                    $(this).removeClass('shadow-lg');
                }
            );

            // Menu dots click handler
            $('.menu-dots').click(function() {
                alert('Menu clicked! Add dropdown functionality here.');
            });

            // Animate all task numbers on load
            setTimeout(function() {
                $('.task-number').each(function() {
                    var $this = $(this);
                    var targetNum = parseInt($this.text());
                    $this.text('0');
                    
                    $({ countNum: 0 }).animate({ countNum: targetNum }, {
                        duration: 1500,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(targetNum);
                        }
                    });
                });
            }, 500);
        });

        // Function to update chart data
        function updateChart(cardIndex, newPercentage) {
            var chart = $('.progress-chart').eq(cardIndex).data('easyPieChart');
            if (chart) {
                chart.update(newPercentage);
            }
        }

        // Function to update task count
        function updateTasks(cardIndex, newCount) {
            var $taskNumber = $('.task-number').eq(cardIndex);
            if ($taskNumber.length) {
                $({ countNum: parseInt($taskNumber.text()) || 0 }).animate({ countNum: newCount }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function() {
                        $taskNumber.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $taskNumber.text(newCount);
                    }
                });
            }
        }
    </script>
</body>
</html>