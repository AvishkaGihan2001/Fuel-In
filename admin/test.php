<?php include 'header.php';
include './config/db.php';
include './services/common.php';

$pendingQuery = "SELECT Count(*) as PendingCount FROM fuelrequest WHERE status= 'Pending'";
$pendingResult = mysqli_fetch_assoc(mysqli_query($con, $pendingQuery));

$pendingCount = $pendingResult['PendingCount'];

$approvalQuery = "SELECT Count(*) as ApprovalCount FROM fuelrequest WHERE status= 'Approval'";
$approvalResult = mysqli_fetch_assoc(mysqli_query($con, $approvalQuery));

$approvalCount = $approvalResult['ApprovalCount'];

$rejectQuery = "SELECT Count(*) as RejectCount FROM fuelrequest WHERE status= 'Reject'";
$rejectResult = mysqli_fetch_assoc(mysqli_query($con, $rejectQuery));

$rejectCount = $rejectResult['RejectCount'];
