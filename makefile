SHELL := /bin/bash
SERVER_PATH := /srv/http
ARROW := \033[1m\033[31m>\033[32m>\033[33m>\033[39m
CL_GREEN := \033[32m
CL_RESET := \033[39m

.SILENT:

all:
	echo -e "${ARROW} Creating production server..."

	# Overriding the ownership of every server files
	rm -rf $(SERVER_PATH)/*
	echo -e "[${CL_GREEN}OK${CL_RESET}] Server cleared"

	# Copy all files
	cp -r * $(SERVER_PATH)
	echo -e "[${CL_GREEN}OK${CL_RESET}] Files copied"

	echo -e "[${CL_GREEN}OK${CL_RESET}] Done! http://localhost"

.PHONY: all