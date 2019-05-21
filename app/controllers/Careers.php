<?php

namespace App;

use Sober\Controller\Controller;

/**
 * Class that only executes for careers page
 * Uses blade file name to expose jobs array
 */

class Careers extends Controller
{
    /**
     * Function to get jobs from the array
     *
     * @return array
     */

    public static function getJobs() {
        $jobs = array();

        $jobs_with_departments = self::getDepartments();

        if (!isset($jobs_with_departments)) {
            return $jobs;
        }

        foreach ($jobs_with_departments as $department) {
            if (isset($department->name)) {
                $dept_jobs = $department->jobs;
                
                foreach ($dept_jobs as $job) {
                    $dept_name = $department->name;
                    $job_title = $job->title;
                    $job_url = $job->absolute_url;
                    $jobs[] = [
                        'job_title' => $job_title,
                        'job_dept'=> $dept_name,
                        'job_url' => $job_url,
                    ];
                }
            }
        }
        
        return $jobs;
    }

    /**
     * Function to get departments which have jobs listed
     * @return array | null
     */

    protected static function getDepartments() {
        $url = 'https://api.greenhouse.io/v1/boards/freshbooks/embed/departments';

        $response = wp_remote_get($url);

        if (is_wp_error($response)) {
            return null;
        }

        $response_code = wp_remote_retrieve_response_code($response);

        try {
            if ($response_code == "200") {
                $data = json_decode(wp_remote_retrieve_body($response));
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }

        $departments_data = $data->departments;
       
        $departmentsWithJobs = [];

        foreach ($departments_data as $department) {
            if (count($department->jobs) > 0 && $department->name !== "No Department") {
                $departmentsWithJobs[] = $department;
            }
        }
        return $departmentsWithJobs;
    }
}
