<?php

namespace WordPress\Blueprints\Compile;

use WordPress\Blueprints\Model\DataClass\StepInterface;
use WordPress\Blueprints\Runner\Step\StepRunnerInterface;

class CompiledStep {

	public function __construct(
		public StepInterface $step,
		public StepRunnerInterface $runner
	) {
	}

}