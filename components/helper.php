
<?php
    function helper($message,  $class = '' ){ 
        $gotoicon = 'relative text-lg font-bold m-auto';
        $gotoclass = 'rounded-xl p-2 text-sm text-start mb-3 shadow-lg shadow-gray-600 animate-bounce';
        $final = '</p>';
        $iconclassarray = array(
            'danger' => ['text-red-800','bg-red-500 text-red-900'],
            'warning' => ['text-yellow-800','bg-yellow-500 text-yellow-900'],
            'success' => ['text-green-800','bg-green-500 text-green-900'],
            'info' => ['text-blue-800','bg-blue-500 text-blue-900'],
            'danger-text' => ['text-red-900','bg-red-500 text-red-900 pl-4 font-bold','rounded-xl px-2 text-sm text-start'],
            '' => 'bg-gray-600 text-gray-100'
        );
        !isset($iconclassarray[$class][2]) ? $final = "<span class='absolute top-0 right-1 text-xl cursor-pointer' onclick='this.parentElement.style.display=\"none\";'>&times;</span></p>" : '';
        $gotoclass = $iconclassarray[$class][2] ?? $gotoclass;
        $alert = "<p class=' ".$iconclassarray[$class][1]." $gotoclass'><i class=' ".$iconclassarray[$class][0]." $gotoicon '>!</i> $message $final"; 
        return $alert;
    }