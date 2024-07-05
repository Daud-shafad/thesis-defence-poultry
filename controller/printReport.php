<?php
require_once '../libraries/mpdf/vendor/autoload.php';
include_once "../config/dbconnect.php";

if (isset($_GET['report_id'])) {
    $report_id = $_GET['report_id'];

    // Fetch report details
    $sql = "SELECT * FROM reports WHERE report_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $report_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $report = $result->fetch_assoc();

    // Create a PDF file using mPDF
    $mpdf = new \Mpdf\Mpdf();
    $html = '<h2>Report</h2>';
    $html .= '<p>Report ID: ' . $report['report_id'] . '</p>';
    $html .= '<p>Report Name: ' . $report['report_name'] . '</p>';
    $html .= '<p>Report Type: ' . $report['report_type'] . '</p>';
    $html .= '<p>Report Date: ' . $report['report_date'] . '</p>';
    $html .= '<p>Report Content: ' . $report['report_content'] . '</p>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('report_' . $report['report_id'] . '.pdf', 'I');
} else {
    echo "Error: No report ID provided.";
}
?>
