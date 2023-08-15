<?php

namespace App\Filters;

use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class RoleMenuFilter implements FilterInterface
{
	public function transform($item)
	{
		if (! $this->isVisible($item)) {
			return false;
		}

		if (isset($item['header'])) {
			$item = $item['header'];
		}

		return $item;
	}

	protected function isVisible($item)
	{
		if (isset($item['roles'])) {
			if (!in_array(Auth::user()->role, $item['roles'])) {
				return false;
			} else {
				return true;
			}
		} else {
			return true;
		}
	}
}