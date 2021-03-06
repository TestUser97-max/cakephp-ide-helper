<?php

namespace IdeHelper\Annotator;

class ClassAnnotator extends AbstractAnnotator {

	/**
	 * @param string $path Path to file.
	 * @return bool
	 */
	public function annotate(string $path): bool {
		$content = file_get_contents($path);

		$this->invokeTasks($path, $content);

		return true;
	}

	/**
	 * @param string $path
	 * @param string $content
	 *
	 * @return void
	 */
	protected function invokeTasks($path, $content): void {
		$tasks = $this->getTasks($content);

		foreach ($tasks as $task) {
			if (!$task->shouldRun($path, $content)) {
				continue;
			}

			$task->annotate($path);
		}
	}

	/**
	 * @param string $content
	 * @return \IdeHelper\Annotator\ClassAnnotatorTask\ClassAnnotatorTaskInterface[]
	 */
	protected function getTasks(string $content): array {
		$taskCollection = new ClassAnnotatorTaskCollection();

		return $taskCollection->tasks($this->_io, $this->_config, $content);
	}

}
