<?php
// Dashboard data - you can modify these values or fetch from database
$completion_percentage = 50;
$new_tasks = 14;
$manager_name = "Services Manager";
$manager_image = "https://via.placeholder.com/80x80/4A90E2/FFFFFF?text=SM"; // Placeholder image
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Chart</title>
    
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Easy Pie Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .header-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 30px;
            border-bottom: 1px solid #dee2e6;
            text-align: center;
        }

        .header-section h2 {
            color: #495057;
            font-size: 28px;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .header-section p {
            color: #6c757d;
            font-size: 16px;
        }

        .content-section {
            padding: 40px 30px;
        }

        .stats-grid {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            flex: 1;
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            border: 1px solid #e9ecef;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .chart-container {
            flex-shrink: 0;
        }

        .tasks-info {
            flex: 1;
            text-align: center;
        }

        .progress-chart {
            position: relative;
        }

        .progress-chart canvas {
            transform: rotate(-90deg);
        }

        .progress-value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 18px;
            font-weight: 600;
            color: #E74C3C;
        }

        .task-number {
            font-size: 32px;
            font-weight: 700;
            color: #E74C3C;
            margin-bottom: 8px;
            display: block;
        }

        .task-label {
            font-size: 14px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .menu-icon {
            float: right;
            margin-top: -10px;
        }

        .menu-dots {
            display: flex;
            flex-direction: column;
            gap: 3px;
            cursor: pointer;
            padding: 10px;
        }

        .menu-dots span {
            width: 4px;
            height: 4px;
            background-color: #E74C3C;
            border-radius: 50%;
        }

        .bottom-section {
            background: #f8f9fa;
            padding: 20px 30px;
            border-top: 1px solid #dee2e6;
        }

        .large-databoxes {
            display: inline-block;
            background: white;
            padding: 15px 25px;
            border-radius: 8px;
            border-left: 4px solid #007bff;
            font-size: 16px;
            font-weight: 500;
            color: #495057;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .progress-card {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }
            
            .manager-info {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="manager-info">
                <img src="<?php echo $manager_image; ?>" alt="Manager" class="manager-avatar">
                <div class="manager-details">
                    <h2><?php echo $manager_name; ?></h2>
                    <p>Dashboard Overview</p>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="content-section">
            <div class="stats-grid">
                <!-- Progress Chart Card -->
                <div class="stat-card progress-card">
                    <div class="chart-container">
                        <div class="progress-chart" data-percent="<?php echo $completion_percentage; ?>">
                            <span class="progress-value"><?php echo $completion_percentage; ?>%</span>
                        </div>
                    </div>
                </div>

                <!-- Tasks Card -->
                <div class="stat-card tasks-card">
                    <div class="menu-icon">
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

        <!-- Bottom Section -->
        <div class="bottom-section">
            <div class="large-databoxes">
                Large Databoxes
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize Easy Pie Chart
            $('.progress-chart').easyPieChart({
                size: 120,
                barColor: '#E74C3C',
                trackColor: '#f1f1f1',
                scaleColor: false,
                lineWidth: 8,
                animate: {
                    duration: 2000,
                    enabled: true
                },
                onStep: function(from, to, percent) {
                    $(this.el).find('.progress-value').text(Math.round(percent) + '%');
                }
            });

            // Add hover effects and animations
            $('.stat-card').hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );

            // Menu dots click handler
            $('.menu-dots').click(function() {
                alert('Menu clicked! You can add dropdown menu functionality here.');
            });

            // Animate task number on load
            $({ countNum: 0 }).animate({ countNum: <?php echo $new_tasks; ?> }, {
                duration: 1500,
                easing: 'swing',
                step: function() {
                    $('.task-number').text(Math.floor(this.countNum));
                },
                complete: function() {
                    $('.task-number').text(<?php echo $new_tasks; ?>);
                }
            });
        });

        // Function to update chart data (can be called from external sources)
        function updateChart(newPercentage) {
            $('.progress-chart').data('easyPieChart').update(newPercentage);
        }

        // Function to update task count
        function updateTasks(newCount) {
            $({ countNum: parseInt($('.task-number').text()) }).animate({ countNum: newCount }, {
                duration: 1000,
                easing: 'swing',
                step: function() {
                    $('.task-number').text(Math.floor(this.countNum));
                },
                complete: function() {
                    $('.task-number').text(newCount);
                }
            });
        }
    </script>
</body>
</html>