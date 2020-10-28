<?php

namespace App\Traits;

trait HandleResponse
{
    /**
     * Success response in json
     * 
     * @param  Array $data
     * @param  string $message
     * @return json
     */
    public function successResponse($data, $message = 'SUCCESS')
    {
        return response()->json(
            $this->formatSuccessResponse($data, $message),
            200
        );
    }

    /**
     * Format successful json response
     * 
     * @param  Array $data
     * @param  string $message
     * @return array
     */
    public function formatSuccessResponse($data, $message = 'SUCCESS')
    {
        return [
            'success'  => true,
            'error_code' => null,
            'message' => $message,
            'data'    => $data
        ];
    }

        /**
     * Format successful json response
     * 
     * @param  Array $data
     * @param  string $message
     * @return array
     */
    public function errorSuccessResponse($data, $message = 'SUCCESS')
    {
        return [
            'success'  => true,
            'error_code' => null,
            'message' => $message,
            'data'    => $data
        ];
    }

    /**
     * Error response in json
     * 
     * @param  Illuminate\Validation\Validator $validator
     * @param  int $status
     * @return json
     */
    public function errorResponse($validator, $error_code, $data = [], $status = 400)
    {
        $message = $validator;

        if (!is_string($validator)) {
            $error = $validator->errors()->toArray();

            if (env('API_FIRST_ERROR_MESSAGE', true)) {
                foreach ($validator->errors()->toArray() as $key => $value) {
                    $message = $value[0];
                    break;
                } //end foreach
            } //end if
        } //endif
        return response()->json(
            $this->formatErrorResponse($validator, $error_code, $data, $status),
            $status
        );
    }

    /**
     * Format error response
     * 
     * @param  Illuminate\Validation\Validator $validator
     * @param  int $status
     * @return array
     */
    public function formatErrorResponse($validator, $error_code, $data = [], $status = 400)
    {
        $message = $validator;

        if (!is_string($validator)) {
            $error = $validator->errors()->toArray();

            if (env('API_FIRST_ERROR_MESSAGE', true)) {
                foreach ($validator->errors()->toArray() as $key => $value) {
                    $message = $value[0];
                    break;
                } //end foreach
            } //end if
        } //endif

        return [
            'success'  => false,
            'error_code' =>  $error_code,
            'message' => $message,
            'data'  => $data
        ];
    }

    public function formatImageUrl($storage, $filename)
    {
        if (filter_var($filename, FILTER_VALIDATE_URL)) {
            return $filename;
        }

        return ($filename) ? env($storage, url() . '/images/') . $filename : $filename;
    }

    /**
     * Format success response of resource
     * use this function if using resource class and need "links" and "meta"
     * 
     * only mimics the formatSuccessResponse()
     * 
     * @param  $resource
     * @param  $message
     * @return json
     */
    public function successResourceResponse($resource, $message)
    {
        return $resource->additional([
            'success' => true,
            'error_code' => null,
            'message' => $message,
            'sync' => time()
        ]);
    }
}
