::================================::
::  Commit & Push changes on git  ::
::================================::

:: User input for commit message
@set /p commit="Commit message: "

:: Commit & Push
@git add --all
@echo.
@git commit -am "%commit%"
@echo.
@git push origin master -f
@echo.

:: Keep shell window open
@pause