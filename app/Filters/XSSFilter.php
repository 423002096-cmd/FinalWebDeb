<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class XSSFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (method_exists($request, 'getPost') && method_exists($request, 'setGlobal')) {
            $post = $request->getPost();

            if (is_array($post) && $post !== []) {
                $request->setGlobal('post', $this->clean($post));
            }
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    private function clean(array $input): array
    {
        foreach ($input as $key => $value) {
            if (is_array($value)) {
                $input[$key] = $this->clean($value);
                continue;
            }

            if (is_string($value)) {
                // Input cleanup reduces stored script payloads; views still use esc() for final output safety.
                $input[$key] = trim(strip_tags($value));
            }
        }

        return $input;
    }
}
