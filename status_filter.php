<?php

// Status filter based on database migration enum values
function filterByStatus($items, $status = null) {
    $validStatuses = ['submitted', 'verified', 'processing', 'done', 'rejected'];
    
    if (!$status) {
        return $items;
    }
    
    if (!in_array($status, $validStatuses)) {
        throw new InvalidArgumentException("Invalid status. Valid statuses: " . implode(', ', $validStatuses));
    }
    
    return $items->filter(function($item) use ($status) {
        return $item->status === $status;
    });
}

// Example usage:
// $submittedItems = filterByStatus($items, 'submitted');
// $verifiedItems = filterByStatus($items, 'verified');
// $processingItems = filterByStatus($items, 'processing');
// $doneItems = filterByStatus($items, 'done');
// $rejectedItems = filterByStatus($items, 'rejected');

echo "Status filter created with enum values: submitted, verified, processing, done, rejected\n";